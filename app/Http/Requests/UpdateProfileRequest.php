<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        $this->merge([
            'dob' => str_replace([' '], '', $this->dob)
        ]);
    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'surname' => 'required|string|min:2',
            'phone' => 'required',
            'dob' => 'required|date_format:d/m/Y',
            'iin' => 'nullable|string|size:12',
            'name' => 'required|string|min:2',
            'sex' => ['required', Rule::in(['male', 'female'])],
            'rules_accept' => 'required|accepted'
        ];
    }
}
