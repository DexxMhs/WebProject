<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudyProgramRequest extends FormRequest
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
            'code' => 'required|string|max:10|unique:study_programs,code',
            'name' => 'required|string|max:100',
            'faculty_id' => 'required|exists:faculties,id',
            'degree_level_id' => 'required|exists:degree_levels,id',
            'head_of_program_id' => 'nullable|exists:lecturers,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Study program code is required.',
            'code.unique' => 'This code is already in use.',
            'code.max' => 'Code must not exceed 10 characters.',

            'name.required' => 'Study program name is required.',
            'name.max' => 'Name must not exceed 100 characters.',

            'faculty_id.required' => 'Please select a faculty.',
            'faculty_id.exists' => 'Selected faculty is invalid.',

            'degree_level_id.required' => 'Please select a degree level.',
            'degree_level_id.exists' => 'Selected degree level is invalid.',

            'head_of_program_id.exists' => 'Selected head of program is invalid.',

            'image.image' => 'Uploaded file must be an image.',
            'image.mimes' => 'Only JPG, JPEG, and PNG formats are allowed.',
            'image.max' => 'Image must not exceed 2MB.',
        ];
    }
}
