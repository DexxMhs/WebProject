<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\StudyProgram;
use App\Models\AcademicSemester;
use App\Http\Requests\StoreClassRequest;
use App\Http\Requests\UpdateClassRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ClassController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $this->authorize('view_classes');
        $classes = ClassModel::with(['studyProgram', 'academicSemester'])->latest()->get();
        return view('dashboard.admin.classes.index', compact('classes'));
    }

    public function create()
    {
        $this->authorize('create_classes');
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
        $this->authorize('edit_classes');
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
        $this->authorize('delete_classes');
        $class->delete();

        return redirect()->route('dashboard.classes.index')->with('success', 'Class deleted successfully.');
    }
}
