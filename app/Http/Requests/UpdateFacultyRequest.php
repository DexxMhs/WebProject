<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateFacultyRequest extends FormRequest
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
        $id = $this->route('faculty')->id;

        return [
            'code' => [
                'required',
                'max:10',
                Rule::unique('faculties')
                    ->ignore($id)
                    ->whereNull('deleted_at'),
            ],
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
            'code.max' => 'Code must not exceed 10 characters.',

            'name.required' => 'Faculty name is required.',
            'name.max' => 'Name must not exceed 100 characters.',

            'description.max' => 'Description must not exceed 255 characters.',

            'image.image' => 'Uploaded file must be an image.',
            'image.mimes' => 'Only JPG, JPEG, and PNG formats are allowed.',
            'image.max' => 'Image must not exceed 2MB.',
        ];
    }
}
