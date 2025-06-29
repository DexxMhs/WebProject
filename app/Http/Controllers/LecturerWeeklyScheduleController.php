<?php

namespace App\Http\Controllers;

use App\Models\WeeklySchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LecturerWeeklyScheduleController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $lecturer = $user->lecturer;

        $weeklySchedules = WeeklySchedule::with(['course', 'class', 'room'])
            ->where('lecturer_id', $lecturer->id)
            ->orderBy('day')
            ->orderBy('start_time')
            ->get();

        return view('dashboard.lecturer.weekly-schedules.index', compact('weeklySchedules'));
    }
}
