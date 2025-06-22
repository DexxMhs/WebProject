<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDegreeLevelRequest extends FormRequest
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
            'code' => 'required|unique:degree_levels,code|max:10',
            'name' => 'required|string|max:50',
            'description' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Degree level code is required.',
            'code.unique' => 'This code is already in use.',
            'code.max' => 'Code must not exceed 10 characters.',

            'name.required' => 'Degree level name is required.',
            'name.max' => 'Name must not exceed 50 characters.',

            'description.max' => 'Description must not exceed 255 characters.',

            'image.image' => 'Uploaded file must be an image.',
            'image.mimes' => 'Only JPG, JPEG, and PNG formats are allowed.',
            'image.max' => 'Image size must not exceed 2MB.',
        ];
    }
}
