<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'order_user_email' => 'required|email',
            'order_user_name' => 'required|string|min:4',
            'order_user_phone' => 'required|string',
            'order_recipient_fio' => 'required|string|min:4',
            'order_recipient_phone' => 'required|string|min:4',
        ];
    }
}
