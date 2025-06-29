<?php

namespace App\Http\Controllers;

use App\Http\Requests\AcceptStudentRequest;
use App\Models\ClassModel;
use App\Models\Role;
use App\Models\StudentCandidateTemp;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CandidateVerificationController extends Controller
{
    public function index()
    {
        $candidates = StudentCandidateTemp::with('user')->latest()->get();
        return view('dashboard.admin.candidates.index', compact('candidates'));
    }

    public function show($id)
    {
        $candidate = StudentCandidateTemp::with(['user', 'parents', 'schools'])->findOrFail($id);
        return view('dashboard.admin.candidates.show', compact('candidate'));
    }

    public function showAcceptForm(StudentCandidateTemp $candidate)
    {
        // Ambil kelas hanya untuk program studi yang sesuai
        $classes = ClassModel::where('study_program_id', $candidate->study_program_id)->get();

        // Ambil ID student selanjutnya
        $nextStudentId = (Student::max('id') ?? 0) + 1;

        // Generate NIM preview
        $nim = $this->generateNIMPreview($candidate->study_program_id, $nextStudentId);

        return view('dashboard.admin.candidates.accept', compact('candidate', 'classes', 'nim'));
    }

    public function accept(AcceptStudentRequest $request, StudentCandidateTemp $candidate)
    {
        // Load relasi tambahan
        $candidate->load(['user', 'parents', 'schools']);
        $validated = $request->validated();

        // Ambil ID student selanjutnya
        $nextStudentId = (Student::max('id') ?? 0) + 1;

        // Generate NIM preview
        $nim = $this->generateNIMPreview($candidate->study_program_id, $nextStudentId);

        $validated['nim'] = $nim;

        // Cari role 'student'
        $studentRole = Role::where('name', 'student')->firstOrFail();

        // Buat Student
        Student::create([
            'user_id' => $candidate->user_id,
            'nim' => $validated['nim'],
            'class_id' => $validated['class_id'],
            'study_program_id' => $candidate->study_program_id,
            'degree_level_id' => $candidate->degree_level_id,
            'building_id' => $candidate->building_id,
            'full_name' => $candidate->full_name,
            'gender' => $candidate->gender,
            'address' => $candidate->address,
            'enrollment_year' => now()->year,
            'status' => 'active',
        ]);

        // Hapus kandidat setelah diterima

        $candidate->update([
            'registration_status' => 'approved',
            'approved_at' => Carbon::now(),
        ]);

        // Update Role User
        $user = User::findOrFail($candidate->user_id);

        $user->update([
            'role_id' => $studentRole->id,
        ]);

        return redirect()->route('dashboard.student-candidates.index')->with('success', 'Student accepted successfully.');
    }

    public function decline($id)
    {
        $candidate = StudentCandidateTemp::findOrFail($id);

        $candidate->update([
            'registration_status' => 'declined',
        ]);

        return redirect()->route('dashboard.student-candidates.index')->with('warning', 'Candidate declined.');
    }

    private function generateNIMPreview($studyProgramId, $nextStudentId)
    {
        $studyProgramPart = str_pad($studyProgramId, 2, '0', STR_PAD_LEFT);
        $yearPart = now()->format('y');
        $studentIdPart = str_pad($nextStudentId, 4, '0', STR_PAD_LEFT);

        return $studyProgramPart . $yearPart . $studentIdPart;
    }
}
