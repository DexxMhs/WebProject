<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Faculty;
use Illuminate\Http\Request;

class BuildingWebController extends Controller
{
    public function index()
    {
        $faculties = Faculty::with('studyPrograms')->get();
        $buildings = Building::all();
        return view('dashboardHomepage.buildings.index', compact('faculties', 'buildings'));
    }

    public function show(string $id)
    {
        $faculties = Faculty::with('studyPrograms')->get();
        $building = Building::find($id);
        return view('dashboardHomepage.buildings.index', compact('faculties', 'building'));
    }
}
