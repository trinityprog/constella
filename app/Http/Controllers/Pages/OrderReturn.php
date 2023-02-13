<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\CleanRepairRequest;
use App\Http\Requests\OrderReturnCreateRequest;
use App\Mail\SendMail;
use App\Models\Order;
use App\Models\Repairs;
use App\Models\Returning;
use App\Services\Bitrix24Service;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderReturn extends Controller
{
    public function index ($id = null)
    {
        $order = Order::find($id);
        return view('pages.user.orders.return', compact('order'));
    }

    public function store (OrderReturnCreateRequest $request, Bitrix24Service $bitrix24Service)
    {
        $data = $request->validated();

        Order::where('unique_id', $data['order_number'])->update([
            'status' => 5,
        ]);

        if(auth()->check()) {
            auth()->user()->returnings()->create($data);
            $bitrix24Service->handleReturnsRequest($data);
            return redirect()->route('user.profile.orders');
        }

        Returning::create($data);

        $bitrix24Service->handleReturnsRequest($data);
        return redirect()->back();
    }

    public function repair (CleanRepairRequest $request, Bitrix24Service $bitrix24Service): RedirectResponse
    {
        $data = $request->validated();

        $repair = Repairs::create([
            'name' => $data['rep_name'],
            'phone' => $data['rep_phone'],
            'time_from' => $data['rep_time_from'],
            'time_to' => $data['rep_time_to'],
            'type' => $data['type']
        ]);

        if($repair->type == 'clear') {
            $type = 'Чистка';
        }else {
            $type = 'Ремонт';
        }

        Mail::to(env('EMAIL_CLIENTSERVICE', 'clientservice@zhannakangroup.com'))
            ->send(new SendMail('[Клиентская служба] - Новая заявка', '
                Имя: '.$repair->name.' <br/>
                Телефон: '.$repair->phone.' <br/>
                Тема: '.$type.' <br/>
                Удобное время: '.$repair->time_from.' - '.$repair->time_to.'
            '));

        $bitrix24Service->handleRepairRequest($repair);

        return redirect()->route('user.profile');
    }

}
