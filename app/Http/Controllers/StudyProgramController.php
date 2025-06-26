<?php

namespace App\Http\Controllers;

use App\Models\StudyProgram;
use App\Models\Faculty;
use App\Models\DegreeLevel;
use App\Models\Lecturer;
use App\Http\Requests\StoreStudyProgramRequest;
use App\Http\Requests\UpdateStudyProgramRequest;
use Illuminate\Support\Facades\Storage;

class StudyProgramController extends Controller
{
    public function index()
    {
        $studyPrograms = StudyProgram::with(['faculty', 'degreeLevel', 'headOfProgram'])->latest()->get();
        return view('dashboard.admin.study-programs.index', compact('studyPrograms'));
    }

    public function show(StudyProgram $studyProgram)
    {
        $studyProgram->load(['faculty', 'degreeLevel', 'headOfProgram']);

        return view('dashboard.admin.study-programs.show', compact('studyProgram'));
    }

    public function create()
    {
        $faculties = Faculty::all();
        $degreeLevels = DegreeLevel::all();
        $lecturers = Lecturer::all();

        return view('dashboard.admin.study-programs.create', compact('faculties', 'degreeLevels', 'lecturers'));
    }

    public function store(StoreStudyProgramRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('study_programs', 'public');
        }

        StudyProgram::create($validated);

        return redirect()->route('dashboard.study-programs.index')->with('success', 'Study program created successfully.');
    }

    public function edit(StudyProgram $studyProgram)
    {
        $faculties = Faculty::all();
        $degreeLevels = DegreeLevel::all();
        $lecturers = Lecturer::all();

        return view('dashboard.admin.study-programs.edit', compact('studyProgram', 'faculties', 'degreeLevels', 'lecturers'));
    }

    public function update(UpdateStudyProgramRequest $request, StudyProgram $studyProgram)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($studyProgram->image) {
                Storage::disk('public')->delete($studyProgram->image);
            }

            $validated['image'] = $request->file('image')->store('study_programs', 'public');
        }

        $studyProgram->update($validated);

        return redirect()->route('dashboard.study-programs.index')->with('success', 'Study program updated successfully.');
    }

    public function destroy(StudyProgram $studyProgram)
    {
        if ($studyProgram->image) {
            Storage::disk('public')->delete($studyProgram->image);
        }

        $studyProgram->delete();

        return redirect()->route('dashboard.study-programs.index')->with('success', 'Study program deleted successfully.');
    }
}
