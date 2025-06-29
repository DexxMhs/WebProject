<?php

namespace App\Http\Controllers;

use App\Models\WeeklySchedule;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LecturerWeeklyScheduleController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $this->authorize('view_lecturer-weekly-schedules');
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
