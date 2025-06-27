<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSemesterRequest extends FormRequest
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
        $semesterId = $this->route('semester')->id;

        return [
            'name'  => ['required', 'string', 'max:100'],
            'code'  => [
                'required',
                'string',
                'max:20',
                Rule::unique('semesters', 'code')
                    ->ignore($semesterId)
                    ->whereNull('deleted_at')
            ],
            'order' => ['required', 'integer', 'min:1', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'  => 'Semester name is required.',
            'name.max' => 'Name must not exceed 255 characters.',

            'code.required'  => 'Semester code is required.',
            'code.unique'    => 'This semester code is already taken.',
            'code.max' => 'Code must not exceed 20 characters.',

            'order.required' => 'Order is required.',
            'order.integer'  => 'Order must be a valid number.',
        ];
    }
}
