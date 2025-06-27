<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semester;
use App\Http\Requests\StoreSemesterRequest;
use App\Http\Requests\UpdateSemesterRequest;

class SemesterController extends Controller
{
    public function index()
    {
        $semesters = Semester::orderBy('order')->get();
        return view('dashboard.admin.semesters.index', compact('semesters'));
    }

    public function create()
    {
        return view('dashboard.admin.semesters.create');
    }

    public function store(StoreSemesterRequest $request)
    {
        Semester::create($request->validated());

        return redirect()->route('dashboard.semesters.index')
            ->with('success', 'Semester created successfully.');
    }

    public function edit(Semester $semester)
    {
        return view('dashboard.admin.semesters.edit', compact('semester'));
    }

    public function update(UpdateSemesterRequest $request, Semester $semester)
    {
        $semester->update($request->validated());

        return redirect()->route('dashboard.semesters.index')
            ->with('success', 'Semester updated successfully.');
    }

    public function destroy(Semester $semester)
    {
        $semester->delete();

        return redirect()->route('dashboard.semesters.index')
            ->with('success', 'Semester deleted successfully.');
    }
}
