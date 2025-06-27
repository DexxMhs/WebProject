<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreLecturerRequest extends FormRequest
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
            'nidn' => [
                'required',
                'max:20',
                Rule::unique('lecturers')
                    ->whereNull('deleted_at'), // jika pakai soft delete
            ],
            'name' => 'required|string|max:100',
            'gender' => 'required|in:male,female',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users'),
            ],
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'faculty_id' => 'nullable|exists:faculties,id',
        ];
    }

    public function messages(): array
    {
        return [
            'nidn.required' => 'NIDN is required.',
            'nidn.unique' => 'This NIDN has already been taken.',
            'nidn.max' => 'NIDN must not exceed 20 characters.',

            'name.required' => 'Lecturer name is required.',
            'name.max' => 'Lecturer name must not exceed 100 characters.',

            'gender.required' => 'Lecturer gender is required.',
            'gender.in' => 'Gender must be either male or female.',

            'email.required' => 'Email is required.',
            'email.email' => 'Email format is invalid.',
            'email.unique' => 'This email is already registered.',

            'phone.max' => 'Phone number must not exceed 20 characters.',

            'photo.image' => 'Uploaded file must be an image.',
            'photo.mimes' => 'Only JPG, JPEG, or PNG files are allowed.',
            'photo.max' => 'Image size must not exceed 2MB.',

            'address.max' => 'Address must not exceed 500 characters.',

            'faculty_id.exists' => 'Selected faculty is invalid.',
        ];
    }
}
