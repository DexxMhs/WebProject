<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCurriculumRequest extends FormRequest
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
            'course_id'            => ['required', 'exists:courses,id'],
            'study_program_id'     => ['required', 'exists:study_programs,id'],
            'academic_semester_id' => ['required', 'exists:academic_semesters,id'],
            'semester_id'          => ['required', 'exists:semesters,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'course_id.required'            => 'Course is required.',
            'course_id.exists'              => 'Selected course does not exist.',
            'study_program_id.required'     => 'Study program is required.',
            'study_program_id.exists'       => 'Selected study program does not exist.',
            'academic_semester_id.required' => 'Academic semester is required.',
            'academic_semester_id.exists'   => 'Selected academic semester does not exist.',
            'semester_id.required'          => 'Semester number is required.',
            'semester_id.exists'            => 'Selected semester does not exist.',
        ];
    }
}
