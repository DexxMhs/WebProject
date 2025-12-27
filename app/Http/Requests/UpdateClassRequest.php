<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClassRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'study_program_id' => 'required|exists:study_programs,id',
            'academic_semester_id' => 'required|exists:academic_semesters,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Class name is required.',
            'study_program_id.required' => 'Please select a study program.',
            'academic_semester_id.required' => 'Please select an academic semester.',
        ];
    }
}
