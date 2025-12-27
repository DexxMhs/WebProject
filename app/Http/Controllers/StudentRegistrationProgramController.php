<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentCandidateTemp;
use App\Models\Building;
use App\Models\DegreeLevel;
use App\Models\StudyProgram;
use App\Http\Requests\StoreStudentProgramRegistrationRequest;

class StudentRegistrationProgramController extends Controller
{
    use AuthorizesRequests;
    public function create()
    {
        $this->authorize('student_registration');
        $user = Auth::user();

        $candidate = StudentCandidateTemp::where('user_id', $user->id)->first();
        if (!$candidate) {
            return redirect()
                ->route('dashboard.student-profile')
                ->with('warning', 'Silakan lengkapi data diri terlebih dahulu sebelum melakukan registrasi.');
        }

        $buildings = Building::all();
        $degreeLevels = DegreeLevel::all();
        $studyPrograms = StudyProgram::all();

        return view('dashboard.student-registration', compact('candidate', 'buildings', 'degreeLevels', 'studyPrograms'));
    }

    public function store(StoreStudentProgramRegistrationRequest $request)
    {
        $user = Auth::user();

        $candidate = StudentCandidateTemp::where('user_id', $user->id)->firstOrFail();

        $candidate->update([
            'building_id' => $request->building_id,
            'degree_level_id' => $request->degree_level_id,
            'study_program_id' => $request->study_program_id,
        ]);

        return redirect()->route('dashboard.home')->with('success', 'Program study registration saved successfully.');
    }
}
