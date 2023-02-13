<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ImagesImportStoreZipRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'comment' => 'required|min:2',
            'zip_file' => 'required|mimes:zip',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
