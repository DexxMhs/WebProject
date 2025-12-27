<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\StudyProgram;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $faculties = Faculty::with('studyPrograms')->get();
        $lecturers = Lecturer::all();
        $students = Student::all();
        $studyPrograms = StudyProgram::all(); // perbaikan nama
        return view('dashboardHomepage.home', compact('faculties', 'lecturers', 'students', 'studyPrograms'));
    }
}
