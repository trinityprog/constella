<?php

namespace App\Http\Controllers\Pages\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\WishedGifts;
use App\Models\Order;
use App\Models\Product;
use App\Models\Promocode;
use App\Models\Wishlist;
use App\Rules\CheckPromocode;
use App\Services\CartService;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartPageController extends Controller
{
    public function index ()
    {
        return view('pages.cart');
    }

    public function store (WishedGifts $request)
    {
        $data = $request->validated();

        if(Cart::count() > 0) {
            Wishlist::create([
                'from' => $data['hi_name'],
                'to' => $data['hi_email'],
                'sum' => Cart::total(),
                'products' => json_encode(Cart::content()),
                'user_id' => (auth()->check()) ? auth()->user()->id : null
            ]);
        }

        return redirect()->back();
    }

    public function promocode(Request $request)
    {
        $request->validate([
            'type' => ['required', 'in:cart,order'],
            'promocode' => ['required', new CheckPromocode()]
        ]);

        session(['promocode' => $request->promocode]);

        $cart_total = 0;
        $order = Order::find($request->order_id ?? 0);
        if($request->order_id && $order != null) {
            $order->update([
                'promocode_id' => Promocode::query()->where('code', $request->promocode)->value('id') ?? null,
            ]);
            $cart_total = CartService::formatTotal($this->updateOrderFullSumm($order, $request->promocode));
        } else {
            $cart_total = CartService::getTotal(true, $request->promocode);
        }

        return [
            'status' => 'success',
            'cart_total' => $cart_total
        ];
    }

    public function updateOrderFullSumm($order, $promocode)
    {
        $content = $order->products;
        $total = 0;

        foreach($content as $product) {
            $p = $product->product;
            $price = CartService::formatCurrency($p->price * $product->count, true, $p->currency_id);
            $price = CartService::discountPromocode($price, $p, $promocode);
            $total += $price;
        }

        $order->update([
            'full_summ' => $total
        ]);

        return $total;
    }

    public function promocodeForget()
    {
        session()->forget('promocode');
    }
}
