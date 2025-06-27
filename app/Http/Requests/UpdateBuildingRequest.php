<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBuildingRequest extends FormRequest
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
        $buildingId = $this->route('building')->id;

        return [
            'code' => [
                'required',
                'string',
                'max:10',
                Rule::unique('buildings', 'code')
                    ->ignore($buildingId)
                    ->whereNull('deleted_at')
            ],
            'name' => ['required', 'string', 'max:100'],
            'address' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'photo' => ['nullable', 'image', 'max:2048'],
            'study_program_ids' => ['nullable', 'array'],
            'study_program_ids.*' => ['exists:study_programs,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Building code is required.',
            'name.required' => 'Building name is required.',
            'photo.image' => 'Photo must be a valid image file.',
            'study_program_ids.*.exists' => 'Selected study program is invalid.',
        ];
    }
}
