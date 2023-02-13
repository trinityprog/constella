<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ImagesImportStoreExcelRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'excel_file' => 'required|mimes:csv,xlsx,xls',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
