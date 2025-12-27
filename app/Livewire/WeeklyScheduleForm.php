<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ClassModel;
use App\Models\Lecturer;
use App\Models\Room;
use App\Models\Course;

class WeeklyScheduleForm extends Component
{
    public $classes;
    public $lecturers;
    public $rooms;

    public $form = [
        'class_id' => '',
        'course_id' => '',
        'lecturer_id' => '',
        'room_id' => '',
        'day' => '',
        'start_time' => '',
        'end_time' => '',
        'notes' => '',
    ];

    public $availableCourses = [];

    public function mount()
    {
        $this->classes = ClassModel::with('studyProgram')->get();
        $this->lecturers = Lecturer::all();
        $this->rooms = Room::all();
    }

    public function updatedForm($property, $value)
    {
        if ($value === 'class_id') {
            $class = ClassModel::with('studyProgram')->find($property);

            if ($class && $class->study_program_id) {
                $this->availableCourses = Course::whereHas('studyPrograms', function ($q) use ($class) {
                    $q->where('study_program_id', $class->study_program_id);
                })->get();
            } else {
                $this->availableCourses = [];
            }

            // Reset course_id setiap kali class berubah
            $this->form['course_id'] = '';
        }
    }

    public function render()
    {
        return view('livewire.weekly-schedule-form');
    }
}
