<?php

namespace App\Http\Controllers\Actions;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequestRequest;
use App\Http\Requests\PartnerShipRequest;
use App\Http\Requests\SubscriptionRequest;
use App\Mail\SendMail;
use App\Models\CustomerRequest;
use App\Models\Partnership;
use App\Models\Subscription;
use App\Services\Bitrix24Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ActionsController extends Controller
{
    public function subscription (SubscriptionRequest $request): RedirectResponse
    {
        $data = $request->validated();

        Subscription::create([
            'email' => $data['sup_email'],
            'ip' => request()->ip()
        ]);

        Mail::to(env('EMAIL_INFO', 'info@zhannakangroup.com'))
            ->send(new SendMail('[Подписка] - Новый подписчик', 'Email: '. $data['sup_email']));

        return redirect()->back()->with('message', 'Подписка успешно оформлена!');
    }

    public function customerRequest (CustomerRequestRequest $request, Bitrix24Service $bitrix24Service)
    {
        $c_request = CustomerRequest::create($request->validated());

        $bitrix24Service->handleCustomerRequest($c_request);

        Mail::to(env('EMAIL_CLIENTSERVICE', 'clientservice@zhannakangroup.com'))
            ->send(new SendMail('[Клиентская служба] - Новая заявка', '
                Имя: '.$c_request->name.' <br/>
                Телефон: '.$c_request->phone.' <br/>
                Тип формы: '.$c_request->typeName.' <br/>
                Тема: '.$c_request->theme->name_ru.' <br/>
                Удобное время: '.$c_request->time_from.' - '.$c_request->time_to.'
            '));

        return redirect()->back()->with('message', 'Заявка успешно принята!');
    }

    public function partnership (PartnerShipRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $partner = Partnership::create([
            'email' => $data['email_partners'],
            'type' => $data['type']
        ]);

        if($partner->type == 'for-partners') {
            $form_type = 'Партнерам';
        }elseif($partner->type == 'for-sponsors') {
            $form_type = 'Спонсорам';
        }elseif($partner->type == 'for-press') {
            $form_type = 'Прессе';
        }

        Mail::to(env('EMAIL_MARKETING', 'pr@zhannakangroup.com'))
            ->send(new SendMail('[Партнерство] - Новая заявка', '
                Email: '.$partner->email.' <br/>
                Тип формы: '.$form_type.'
            '));

        return redirect()->back()->with('message', 'Заявка успешно принята!');
    }
}
