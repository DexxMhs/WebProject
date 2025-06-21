<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCandidateTempRequest extends FormRequest
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
            'full_name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'religion' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'country_of_birth' => 'required|string|max:255',
            'citizenship' => 'required|string|max:255',
            'nik' => 'required|digits:16|numeric|unique:student_candidate_temps,nik',
            'address' => 'required|string|max:500',
            'email' => 'required|email|max:255|unique:users,email',
            'phone_number' => 'required',
        ];
    }
}
