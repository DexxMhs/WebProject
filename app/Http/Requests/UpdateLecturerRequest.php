<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateLecturerRequest extends FormRequest
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
        $id = $this->route('lecturer')->id;
        $lecturer = $this->route('lecturer');
        $user_id = $lecturer?->user?->id;

        return [
            'nidn' => [
                'required',
                'max:20',
                Rule::unique('lecturers')->ignore($id)->whereNull('deleted_at'),
            ],
            'name' => 'required|string|max:100',
            'gender' => 'required|in:male,female',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user_id),
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
            'nidn.numeric' => 'NIDN must be a number.',
            'nidn.max' => 'NIDN must not exceed 20 digits.',
            'nidn.unique' => 'This NIDN is already taken.',

            'name.required' => 'Lecturer name is required.',
            'name.max' => 'Name must not exceed 100 characters.',

            'gender.required' => 'Gender is required.',
            'gender.in' => 'Gender must be either male or female.',

            'email.required' => 'Email is required.',
            'email.email' => 'Email must be a valid email address.',
            'email.max' => 'Email must not exceed 255 characters.',
            'email.unique' => 'This email is already taken.',

            'phone.max' => 'Phone must not exceed 20 characters.',

            'photo.image' => 'Photo must be an image file.',
            'photo.mimes' => 'Photo must be a JPG, JPEG, or PNG file.',
            'photo.max' => 'Photo size must not exceed 2MB.',

            'address.max' => 'Address must not exceed 500 characters.',

            'faculty_id.exists' => 'Selected faculty is invalid.',
        ];
    }
}
