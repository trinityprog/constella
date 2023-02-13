<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class LoginRequest extends FormRequest
{
    protected $errorBag = 'login';

    public function withValidator($validator)
    {
        $user = User::where('email', $this->log_email)->first();

        if($user) {
            $validator->after(function ($validator) use ($user) {
                if (!Hash::check($this->log_password, $user->password) ) {
                    $validator->errors()->add('log_password', trans('auth.password'));
                }
            });
        }

        return;
    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'log_email' => 'required|email|exists:users,email',
            'log_password' => 'required',
            'remember' => 'nullable'
        ];
    }
}
