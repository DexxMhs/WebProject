<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFacultyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => 'required|unique:faculties,code|max:10',
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Faculty code is required.',
            'code.unique' => 'This code is already in use.',
            'code.max' => 'Faculty code must not exceed 10 characters.',

            'name.required' => 'Faculty name is required.',
            'name.max' => 'Faculty name must not exceed 100 characters.',

            'description.max' => 'Description must not exceed 255 characters.',

            'image.image' => 'Uploaded file must be an image.',
            'image.mimes' => 'Only JPG, JPEG, or PNG files are allowed.',
            'image.max' => 'Image size must not exceed 2MB.',
        ];
    }
}
