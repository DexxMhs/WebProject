<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentCandidateTempRequest;
use App\Interfaces\StudentCandidateTempRepositoryInterface;
use App\Models\StudentCandidateTemp;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StudentProfileController extends Controller
{
    use AuthorizesRequests;
    private StudentCandidateTempRepositoryInterface $studentCandidateTempRepository;

    public function __construct(StudentCandidateTempRepositoryInterface $studentCandidateTempRepository)
    {
        $this->studentCandidateTempRepository = $studentCandidateTempRepository;
    }

    public function index()
    {
        $this->authorize('guest_profile');
        return view('dashboard.student-profile', [
            "title" => "Data Diri"
        ]);
    }
}
