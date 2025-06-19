<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentCandidateTempRequest;
use App\Interfaces\StudentCandidateTempRepositoryInterface;
use Illuminate\Http\Request;

class StudentProfileController extends Controller
{
    private StudentCandidateTempRepositoryInterface $studentCandidateTempRepository;

    public function __construct(StudentCandidateTempRepositoryInterface $studentCandidateTempRepository)
    {
        $this->studentCandidateTempRepository = $studentCandidateTempRepository;
    }

    public function index()
    {
        return view('dashboard.student-profile', [
            "title" => "Data Diri"
        ]);
    }
}
