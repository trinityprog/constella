<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    protected $errorBag = 'register';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'reg_name' => 'required|string|min:2',
            'reg_email' => 'required|unique:users,email',
            'reg_password' => 'required',
            'reg_sex' => ['required', Rule::in(['male', 'female'])],
            'rules_accept' => 'required|accepted'
        ];
    }
}
