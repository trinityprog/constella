<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddAddressRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'country' => 'required',
            'area' => 'required',
            'city' => 'required',
            'index' => 'required',
            'address' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'title' => 'required',
            'phone' => 'required',
        ];
    }
}
