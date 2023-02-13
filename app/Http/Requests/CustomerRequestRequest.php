<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->redirect = url()->previous() . '#contact-us';
        $this->errorBag = 'customer-request';

        return [
            'type' => 'required|in:feedback,call,video',
            'theme_id' => 'required|exists:customer_request_themes,id',
            'name' => 'required|min:2',
            'phone' => 'required',
            'time_from' => 'required',
            'time_to' => 'required',
        ];
    }
}
