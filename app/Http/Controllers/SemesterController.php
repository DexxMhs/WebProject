<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Models\Semester;
use App\Http\Requests\StoreSemesterRequest;
use App\Http\Requests\UpdateSemesterRequest;

class SemesterController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('view_semesters');
        $semesters = Semester::orderBy('number')->get();
        return view('dashboard.admin.semesters.index', compact('semesters'));
    }

    public function create()
    {
        $this->authorize('create_semesters');
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
        $this->authorize('edit_semesters');
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
        $this->authorize('delete_semesters');
        $semester->delete();

        return redirect()->route('dashboard.semesters.index')
            ->with('success', 'Semester deleted successfully.');
    }
}
