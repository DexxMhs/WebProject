<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePermissionRequest extends FormRequest
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
            'groupby' => 'required|string|max:100',
            'name' => 'required|string|max:100|unique:permissions,name,' . $this->permission->id,
        ];
    }

    public function messages(): array
    {
        return [
            'groupby.required' => 'Group permission wajib diisi.',
            'groupby.string' => 'Group harus berupa teks.',
            'groupby.max' => 'Group tidak boleh lebih dari 100 karakter.',

            'name.required' => 'Nama permission wajib diisi.',
            'name.string' => 'Nama permission harus berupa teks.',
            'name.max' => 'Nama permission tidak boleh lebih dari 100 karakter.',
            'name.unique' => 'Nama permission sudah digunakan.',
        ];
    }
}
