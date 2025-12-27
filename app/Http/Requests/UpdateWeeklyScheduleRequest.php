<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWeeklyScheduleRequest extends FormRequest
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
            'class_id' => 'required|exists:classes,id',
            'course_id' => 'required|exists:courses,id',
            'lecturer_id' => 'required|exists:lecturers,id',
            'room_id' => 'required|exists:rooms,id',
            'day' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'notes' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'class_id.required' => 'Class is required.',
            'class_id.exists' => 'Selected class does not exist.',

            'course_id.required' => 'Course is required.',
            'course_id.exists' => 'Selected course does not exist.',

            'lecturer_id.required' => 'Lecturer is required.',
            'lecturer_id.exists' => 'Selected lecturer does not exist.',

            'room_id.required' => 'Room is required.',
            'room_id.exists' => 'Selected room does not exist.',

            'day.required' => 'Day is required.',
            'day.in' => 'Selected day is invalid.',

            'start_time.required' => 'Start time is required.',
            'start_time.date_format' => 'Start time format must be HH:mm (e.g., 08:00).',

            'end_time.required' => 'End time is required.',
            'end_time.date_format' => 'End time format must be HH:mm (e.g., 10:00).',
            'end_time.after' => 'End time must be after start time.',

            'notes.max' => 'Notes may not be more than 255 characters.',
        ];
    }
}
