<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function missionIndex()
    {
        $faculties = Faculty::with('StudyPrograms')->get();
        return view('dashboardHomepage.misi', compact('faculties'));
    }

    public function visiIndex()
    {
        $faculties = Faculty::with('StudyPrograms')->get();
        return view('dashboardHomepage.visi', compact('faculties'));
    }

    public function rektorIndex()
    {
        $faculties = Faculty::with('StudyPrograms')->get();
        return view('dashboardHomepage.sambutanrektor', compact('faculties'));
    }
}
