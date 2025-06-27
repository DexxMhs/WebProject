<?php

namespace App\Http\Controllers;

use App\Models\WeeklySchedule;
use App\Models\ClassModel;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Room;
use App\Http\Requests\StoreWeeklyScheduleRequest;
use App\Http\Requests\UpdateWeeklyScheduleRequest;

class WeeklyScheduleController extends Controller
{
    public function index()
    {
        $schedules = WeeklySchedule::with(['class', 'course', 'lecturer', 'room'])->latest()->get();
        return view('dashboard.admin.weekly-schedules.index', compact('schedules'));
    }

    public function create()
    {
        $classes = ClassModel::all();
        $courses = Course::all();
        $lecturers = Lecturer::all();
        $rooms = Room::all();

        return view('dashboard.admin.weekly-schedules.create', compact('classes', 'courses', 'lecturers', 'rooms'));
    }

    public function store(StoreWeeklyScheduleRequest $request)
    {
        WeeklySchedule::create($request->validated());

        return redirect()->route('dashboard.weekly-schedules.index')->with('success', 'Weekly schedule created successfully.');
    }

    public function edit(WeeklySchedule $weeklySchedule)
    {
        $classes = ClassModel::all();
        $courses = Course::all();
        $lecturers = Lecturer::all();
        $rooms = Room::all();

        return view('dashboard.admin.weekly-schedules.edit', compact('weeklySchedule', 'classes', 'courses', 'lecturers', 'rooms'));
    }

    public function update(UpdateWeeklyScheduleRequest $request, WeeklySchedule $weeklySchedule)
    {
        $weeklySchedule->update($request->validated());

        return redirect()->route('dashboard.weekly-schedules.index')->with('success', 'Weekly schedule updated successfully.');
    }

    public function destroy(WeeklySchedule $weeklySchedule)
    {
        $weeklySchedule->delete();

        return redirect()->route('dashboard.weekly-schedules.index')->with('success', 'Weekly schedule deleted successfully.');
    }
}
