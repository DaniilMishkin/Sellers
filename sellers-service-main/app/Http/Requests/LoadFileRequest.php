<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoadFileRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'file' => ['bail', 'required', 'file', 'mimes:csv,txt,xls,xlsx'],
        ];
    }

    public function messages(): array
    {
        return [
            'file' => 'The file must be a file of type CSV.',
        ];
    }
}
