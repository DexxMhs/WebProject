<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDegreeLevelRequest extends FormRequest
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
        $id = $this->route('degree_level')->id;

        return [
            'code' => [
                'required',
                'max:10',
                Rule::unique('degree_levels')
                    ->ignore($id)
                    ->whereNull('deleted_at'),
            ],
            'name' => 'required|string|max:50',
            'description' => 'nullable|string|max:255',
            'duration_years' => 'nullable|integer|min:1|max:10',
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

            'duration_years.integer' => 'Duration must be a number.',
            'duration_years.min' => 'Duration must be at least 1 year.',
            'duration_years.max' => 'Duration must not exceed 10 years.',

            'image.image' => 'Uploaded file must be an image.',
            'image.mimes' => 'Only JPG, JPEG, and PNG formats are allowed.',
            'image.max' => 'Image size must not exceed 2MB.',
        ];
    }
}
