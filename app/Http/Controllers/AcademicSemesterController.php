<?php

namespace App\Http\Controllers;

use App\Models\AcademicSemester;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAcademicSemesterRequest;
use App\Http\Requests\UpdateAcademicSemesterRequest;


class AcademicSemesterController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('view_academic-semesters');
        $academicSemesters = AcademicSemester::latest()->get();
        return view('dashboard.admin.academic-semesters.index', compact('academicSemesters'));
    }

    public function create()
    {
        $this->authorize('create_academic-semesters');
        return view('dashboard.admin.academic-semesters.create');
    }

    public function store(StoreAcademicSemesterRequest $request)
    {
        AcademicSemester::create($request->validated());

        return redirect()->route('dashboard.academic-semesters.index')
            ->with('success', 'Academic semester created successfully.');
    }

    public function edit(AcademicSemester $academicSemester)
    {
        $this->authorize('edit_academic-semesters');
        return view('dashboard.admin.academic-semesters.edit', compact('academicSemester'));
    }

    public function update(UpdateAcademicSemesterRequest $request, AcademicSemester $academicSemester)
    {
        $academicSemester->update($request->validated());

        return redirect()->route('dashboard.academic-semesters.index')
            ->with('success', 'Academic semester updated successfully.');
    }

    public function destroy(AcademicSemester $academicSemester)
    {
        $this->authorize('delete_academic-semesters');
        $academicSemester->delete();

        return redirect()->route('dashboard.academic-semesters.index')
            ->with('success', 'Academic semester deleted successfully.');
    }
}
