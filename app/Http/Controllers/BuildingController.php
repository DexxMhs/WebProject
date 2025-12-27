<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\StudyProgram;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreBuildingRequest;
use App\Http\Requests\UpdateBuildingRequest;

class BuildingController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('view_buildings');
        $buildings = Building::with('studyPrograms')->latest()->get();
        return view('dashboard.admin.buildings.index', compact('buildings'));
    }

    public function create()
    {
        $this->authorize('create_buildings');
        $studyPrograms = StudyProgram::all();
        return view('dashboard.admin.buildings.create', compact('studyPrograms'));
    }

    public function store(StoreBuildingRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('buildings', 'public');
        }

        $building = Building::create($validated);
        $building->studyPrograms()->sync($request->input('study_program_ids', []));

        return redirect()->route('dashboard.buildings.index')->with('success', 'Building created successfully.');
    }

    public function edit(Building $building)
    {
        $this->authorize('edit_buildings');
        $studyPrograms = StudyProgram::all();
        return view('dashboard.admin.buildings.edit', compact('building', 'studyPrograms'));
    }

    public function update(UpdateBuildingRequest $request, Building $building)
    {
        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            if ($building->photo) {
                Storage::disk('public')->delete($building->photo);
            }
            $validated['photo'] = $request->file('photo')->store('buildings', 'public');
        }

        $building->update($validated);
        $building->studyPrograms()->sync($request->input('study_program_ids', []));

        return redirect()->route('dashboard.buildings.index')->with('success', 'Building updated successfully.');
    }

    public function destroy(Building $building)
    {
        $this->authorize('delete_buildings');
        if ($building->photo) {
            Storage::disk('public')->delete($building->photo);
        }

        $building->studyPrograms()->detach();
        $building->delete();

        return redirect()->route('dashboard.buildings.index')->with('success', 'Building deleted successfully.');
    }
}
