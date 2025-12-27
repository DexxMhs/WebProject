<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcceptStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nim' => 'required|string|max:20|unique:students,nim',
            'class_id' => 'required|exists:classes,id',
        ];
    }

    public function messages(): array
    {
        return [
            'nim.required' => 'NIM is required.',
            'nim.unique' => 'NIM already exists.',
            'class_id.required' => 'Class is required.',
        ];
    }
}
