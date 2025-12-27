<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Models\Course;
use App\Models\StudyProgram;
use App\Models\AcademicSemester;
use App\Models\Semester;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCurriculumRequest;
use App\Http\Requests\UpdateCurriculumRequest;

class CurriculumController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('view_curriculums');
        $curriculums = Curriculum::with(['course', 'studyProgram', 'academicSemester', 'semester'])->get();
        return view('dashboard.admin.curriculums.index', compact('curriculums'));
    }

    public function create()
    {
        $this->authorize('create_curriculums');
        $courses = Course::all();
        $studyPrograms = StudyProgram::all();
        $academicSemesters = AcademicSemester::all();
        $semesters = Semester::all();

        return view('dashboard.admin.curriculums.create', compact('courses', 'studyPrograms', 'academicSemesters', 'semesters'));
    }

    public function store(StoreCurriculumRequest $request)
    {
        Curriculum::create($request->validated());

        return redirect()->route('dashboard.curriculums.index')->with('success', 'Curriculum created successfully.');
    }

    public function edit(Curriculum $curriculum)
    {
        $this->authorize('edit_curriculums');
        $courses = Course::all();
        $studyPrograms = StudyProgram::all();
        $academicSemesters = AcademicSemester::all();
        $semesters = Semester::all();

        return view('dashboard.admin.curriculums.edit', compact('curriculum', 'courses', 'studyPrograms', 'academicSemesters', 'semesters'));
    }

    public function update(UpdateCurriculumRequest $request, Curriculum $curriculum)
    {
        $curriculum->update($request->validated());

        return redirect()->route('dashboard.curriculums.index')->with('success', 'Curriculum updated successfully.');
    }

    public function destroy(Curriculum $curriculum)
    {
        $this->authorize('delete_curriculums');
        $curriculum->delete();

        return redirect()->route('dashboard.curriculums.index')->with('success', 'Curriculum deleted successfully.');
    }
}
