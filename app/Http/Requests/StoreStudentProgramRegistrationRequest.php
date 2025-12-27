<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentProgramRegistrationRequest extends FormRequest
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
            'building_id' => 'required|exists:buildings,id',
            'degree_level_id' => 'required|exists:degree_levels,id',
            'study_program_id' => 'required|exists:study_programs,id',
        ];
    }

    public function messages(): array
    {
        return [
            'building_id.required' => 'Gedung kampus wajib dipilih.',
            'degree_level_id.required' => 'Jenjang pendidikan wajib dipilih.',
            'study_program_id.required' => 'Program studi wajib dipilih.',
        ];
    }
}
