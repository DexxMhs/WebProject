<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRoomRequest extends FormRequest
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
            'building_id' => ['required', 'exists:buildings,id'],
            'code' => [
                'required',
                'string',
                'max:10',
                Rule::unique('rooms', 'code')
                    ->whereNull('deleted_at')
            ],
            'name' => ['required', 'string', 'max:100'],
            'capacity' => ['nullable', 'integer', 'min:1'],
            'type' => ['required', 'in:classroom,lab,hall,office'],
            'description' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'building_id.required' => 'Please select a building.',
            'building_id.exists' => 'Selected building is invalid.',
            'code.required' => 'Room code is required.',
            'code.unique' => 'Room code must be unique.',
            'name.required' => 'Room name is required.',
            'type.required' => 'Room type is required.',
        ];
    }
}
