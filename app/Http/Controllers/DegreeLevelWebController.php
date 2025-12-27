<?php

namespace App\Http\Controllers;

use App\Models\DegreeLevel;
use App\Models\Faculty;
use Illuminate\Http\Request;

class DegreeLevelWebController extends Controller
{
    public function index()
    {
        $faculties = Faculty::with('studyPrograms')->get();
        $degreeLevels = DegreeLevel::all();

        return view('dashboardHomepage.degree-levels.index', compact('faculties', 'degreeLevels'));
    }
}
