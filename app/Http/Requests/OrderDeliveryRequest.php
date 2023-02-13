<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderDeliveryRequest extends FormRequest
{
    public $rules = [];

    public function authorize()
    {
        return true;
    }

//    public function prepareForValidation()
//    {
//        $rules = [];
//
//        if(empty($this->address_id)) {
//            $rules = array_merge($rules, [
//                'country' => 'required',
//                'area' => 'required',
//                'city' => 'required',
//                'index' => 'required',
//                'phone' => 'required',
//                'title' => 'required',
//            ]);
//        }
//
//        if(empty($this->input('citychosen'))) {
//            $rules = array_merge($rules, [
//                'delivery_country' => 'required',
//                'address' => 'required',
//            ]);
//        }
//
//        $this->rules = $rules;
//    }

//    public function rules(): array
//    {
//
//    }
}
