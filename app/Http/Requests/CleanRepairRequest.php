<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CleanRepairRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'rep_name' => 'required|min:2',
            'rep_phone' => 'required',
            'rep_time_from' => 'required',
            'rep_time_to' => 'required',
            'type' => 'required'
        ];
    }
}
