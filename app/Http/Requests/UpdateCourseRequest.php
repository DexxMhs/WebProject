<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCourseRequest extends FormRequest
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
        $id = $this->route('course')->id;

        return [
            'code'        => [
                'required',
                'string',
                'max:20',
                Rule::unique('courses', 'code')
                    ->ignore($id)
                    ->whereNull('deleted_at')
            ],
            'name'        => ['required', 'string', 'max:100'],
            'credit'      => ['required', 'integer', 'min:1'],
            'description' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'code.required'   => 'Course code is required.',
            'code.unique'     => 'Course code already used.',
            'name.required'   => 'Course name is required.',
            'credit.required' => 'Credit is required.',
            'credit.integer'  => 'Credit must be a number.',
            'credit.min'      => 'Credit must be at least 1.',
        ];
    }
}
