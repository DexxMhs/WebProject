<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAcademicSemesterRequest extends FormRequest
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
            'name'       => ['required', 'string', 'max:100'],
            'code'       => [
                'required',
                'string',
                'max:20',
                Rule::unique('academic_semesters', 'code')
                    ->whereNull('deleted_at')
            ],
            'start_date' => ['required', 'date'],
            'end_date'   => ['required', 'date', 'after_or_equal:start_date'],
            'status'     => ['required', 'in:active,inactive'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'        => 'The name is required.',

            'code.required'        => 'The code is required.',
            'code.unique'          => 'This code already exists.',

            'start_date.required'  => 'Start date is required.',

            'end_date.required'    => 'End date is required.',
            'end_date.after_or_equal' => 'End date must be after or equal to start date.',

            'status.required'      => 'Status is required.',
            'status.in'            => 'Status must be active or inactive.',
        ];
    }
}
