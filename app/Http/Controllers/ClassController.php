<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\StudyProgram;
use App\Models\AcademicSemester;
use App\Http\Requests\StoreClassRequest;
use App\Http\Requests\UpdateClassRequest;

class ClassController extends Controller
{
    public function index()
    {
        $classes = ClassModel::with(['studyProgram', 'academicSemester'])->latest()->get();
        return view('dashboard.admin.classes.index', compact('classes'));
    }

    public function create()
    {
        $studyPrograms = StudyProgram::all();
        $academicSemesters = AcademicSemester::all();

        return view('dashboard.admin.classes.create', compact('studyPrograms', 'academicSemesters'));
    }

    public function store(StoreClassRequest $request)
    {
        ClassModel::create($request->validated());

        return redirect()->route('dashboard.classes.index')->with('success', 'Class created successfully.');
    }

    public function edit(ClassModel $class)
    {
        $studyPrograms = StudyProgram::all();
        $academicSemesters = AcademicSemester::all();

        return view('dashboard.admin.classes.edit', compact('class', 'studyPrograms', 'academicSemesters'));
    }

    public function update(UpdateClassRequest $request, ClassModel $class)
    {
        $class->update($request->validated());

        return redirect()->route('dashboard.classes.index')->with('success', 'Class updated successfully.');
    }

    public function destroy(ClassModel $class)
    {
        $class->delete();

        return redirect()->route('dashboard.classes.index')->with('success', 'Class deleted successfully.');
    }
}
