<?php

namespace App\Http\Controllers;


use App\Models\Course;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

class CourseController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('view_courses');
        $courses = Course::latest()->get();
        return view('dashboard.admin.courses.index', compact('courses'));
    }

    public function create()
    {
        $this->authorize('create_courses');
        return view('dashboard.admin.courses.create');
    }

    public function store(StoreCourseRequest $request)
    {
        Course::create($request->validated());

        return redirect()->route('dashboard.courses.index')->with('success', 'Course created successfully.');
    }

    public function edit(Course $course)
    {
        $this->authorize('edit_courses');
        return view('dashboard.admin.courses.edit', compact('course'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->validated());

        return redirect()->route('dashboard.courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $this->authorize('delete_courses');
        $course->delete();

        return redirect()->route('dashboard.courses.index')->with('success', 'Course deleted successfully.');
    }
}
