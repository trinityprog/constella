<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderReturnCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'order_number' => 'required|exists:orders,unique_id',
            'name' => 'required',
            'phone' => 'required|string',
            'reason' => 'required',
            'city' => 'required',
            'address' => 'required|string'
        ];
    }
}
