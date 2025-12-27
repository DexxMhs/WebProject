<?php

namespace App\Http\Controllers;

use App\Models\WeeklySchedule;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentWeeklyScheduleController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $this->authorize('view_student-weekly-schedules');
        $user = Auth::user();
        $student = $user->student;
        $class = $student->class;

        $weeklySchedules = WeeklySchedule::with(['course', 'lecturer', 'room'])
            ->where('class_id', $class->id)
            ->orderBy('day')
            ->orderBy('start_time')
            ->get();

        return view('dashboard.student.weekly-schedules.index', compact('weeklySchedules'));
    }
}
