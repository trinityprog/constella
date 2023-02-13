<?php

namespace App\Http\Controllers\Pages\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderCreateRequest;
use App\Http\Requests\OrderDeliveryRequest;
use App\Mail\PasswordRegister;
use App\Mail\SendMail;
use App\Models\Currency;
use App\Models\Order;
use App\Models\OrderInfo;
use App\Models\Promocode;
use App\Models\User;
use App\Services\Bitrix24Service;
use App\Services\CartService;
use App\Services\CDEKService;
use App\Services\PaymentService;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class OrderPageController extends Controller
{
    public function index ($order = null)
    {
        if(!auth()->check() && !Cookie::has('guest_email')) return view('pages.order.step0');

        if($order) $order = Order::find($order);

        return view('pages.order.step1', compact('order'));
    }

    public function step0()
    {
        return view('mobile.step0_guest');
    }

    public function store (OrderCreateRequest $request)
    {
        $data = $request->validated();

        $result = false;

        $order = null;

        $userToBeAuthed = null;

        DB::transaction(function () use ($data, &$result, &$order, &$userToBeAuthed) {
            $password = Str::random(8);

            if(!auth()->check()) {
                $user = User::create([
                    'name' => $data['order_user_name'],
                    'email' => $data['order_user_email'],
                    'password' => bcrypt($password),
                    'sex' => 'female'
                ]);

                try {
                    Mail::to($user->email)->send(new PasswordRegister($password));
                } catch (\Exception $exception) {
                    Log::error($exception->getMessage());
                }
            }else {
                $user = auth()->user();
            }

            $user->info()->create([
                'phone' => $data['order_user_phone']
            ]);

            $currency = strtoupper(Cookie::get('currency'));
            $currencyId = Currency::query()->where('code', $currency)->value('id');

            $order = $user->orders()->create([
                'unique_id' => substr(now()->timestamp, -6),
                'status' => 0,
                'promocode_id' => Promocode::query()->where('code', session('promocode'))->value('id') ?? null,
                'full_summ' => CartService::getTotal(false, session('promocode')),
                'currency_id' => $currencyId
            ]);

            $order->info()->create([
                'recipient_fio' => $data['order_recipient_fio'],
                'recipient_phone' => $data['order_recipient_phone']
            ]);

            foreach(Cart::content() as $product) {
                $order->products()->create([
                    'product_id' => $product->model->id,
                    'count' => $product->qty,
                    'options' => json_encode($product->options),
                    'price' => $product->price
                ]);
            }

            $userToBeAuthed = $user;

            $result = true;
        });

        auth()->login($userToBeAuthed, true);

        if($result) {
            Cart::destroy();
            session()->forget('promocode');

            return redirect()->route('order.dinfo', $order->id)->withCookies([
                cookie()->forget('guest_email')
            ]);
        }

        return redirect()->route('cart');
    }

    public function dinfo ($id)
    {
        $order = Order::find($id);
        return view('pages.order.step2', compact('order'));
    }

    public function delivery (Request $request, $id): RedirectResponse
    {
        if(auth()->guest())
        {
            $data = $request->validate([
                'coverup' => 'required',

                'area' => ['required_without:citychosen'],
                'city' => ['required_without:citychosen'],
                'index' => ['required_without:citychosen'],
                'phone' => ['required_without:citychosen'],
                'title' => ['required_without:citychosen'],
                'country' => ['required_without:citychosen'],
                'address' => ['required_without:citychosen'],

                'delivery_country' => ['required_without:citychosen'],
                'citychosen' => 'required_without:delivery_country',
            ]);
        } else {
            $data = $request->validate([
                'coverup' => 'required',
                'address_id' => ['required_with:delivery_country'],
                'delivery_country' => ['required_without:citychosen'],
                'citychosen' => 'required_without:delivery_country',
            ]);
        }

        $order = Order::find($id);

        if(!isset($data['address_id']) && isset($data['citychosen']) && $data['citychosen'] == null) {
            $address = auth()->user()->addresses()->create([
                'country'  => $data['country'],
                'area'  => $data['area'],
                'city'  => $data['city'],
                'index'  => $data['index'],
                'address'  => $data['address'],
                'phone'  => $data['phone'],
                'title'  => $data['title'],
                'name' => $order->info->recipient_fio
            ]);
        }

        $dprice = 0;

        if(isset($data['delivery_country'])) {
            if($data['delivery_country'] === 'kazakhstan') {
                $dprice = 7000;
            }elseif($data['delivery_country'] === 'russia') {
                $dprice = 14000;
            }else {
                $dprice = 2500;
            }
        }

        OrderInfo::updateOrCreate([
            'order_id' => $order->id
        ],[
            'delivery_type' => (isset($data['citychosen'])) ? 'selfpickup' : 'courier',
            'delivery_address_id' => (isset($address)) ? $address->id : (isset($data['address_id']) ? $data['address_id'] : null),
            'package_type' => $data['coverup'],
            'package_price' => ($data['coverup'] == 'unique_branded') ? 5000 : 0,
            'delivery_pickup' => (isset($data['citychosen'])) ? $data['citychosen'] : null,
            'delivery_price' => (isset($data['citychosen'])) ? 0 : $dprice,
            'delivery_days' => (isset($data['citychosen'])) ? 0 : $order->info->delivery_days
        ]);

        return redirect()->route('order.payment.1', $order->id);
    }

    public function paymentCheck ($order, Bitrix24Service $bitrix24Service)
    {
        $order = Order::find($order);
        $address = $order->info->address;
        try {
            $bitrix24Service->handleOrder($order);
        } catch (\Exception $e) {

        }
        return view('pages.order.step3', compact('order', 'address'));
    }

    public function paymentProcess (Request $request) {
        $order = Order::find($request->input('order_id'));
        (new PaymentService())->pay($order);
    }

}
