<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSemesterRequest extends FormRequest
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
            'number' => [
                'required',
                'integer',
                'min:1',
                'max:20',
                Rule::unique('semesters', 'number')
                    ->whereNull('deleted_at')
            ],
            'name'   => ['required', 'string', 'max:50'],
        ];
    }

    public function messages(): array
    {
        return [
            'number.required' => 'Semester number is required.',
            'number.integer'  => 'Semester number must be an integer.',
            'number.unique'   => 'This semester number already exists.',

            'name.required'   => 'Semester name is required.',
            'name.max'        => 'Semester name is too long.',
        ];
    }
}
