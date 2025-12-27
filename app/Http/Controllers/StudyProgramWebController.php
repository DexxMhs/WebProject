<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\StudyProgram;
use Illuminate\Http\Request;

class StudyProgramWebController extends Controller
{
    public function show(string $id)
    {
        $faculties = Faculty::with('studyPrograms')->get();
        $studyProgram = StudyProgram::find($id);
        return view('dashboardHomepage.study-programs.show', compact('faculties', 'studyProgram'));
    }
}
