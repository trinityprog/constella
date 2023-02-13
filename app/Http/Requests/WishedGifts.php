<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WishedGifts extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $this->redirect = url()->previous().'#hint-gift';

        return [
            'hi_name' => 'required|string|min:4',
            'hi_email' => 'required|email',
        ];
    }
}
