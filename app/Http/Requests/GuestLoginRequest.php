<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuestLoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'g_email' => 'required|email|unique:users,email',
            'rules_accept' => 'accepted'
        ];
    }
}
