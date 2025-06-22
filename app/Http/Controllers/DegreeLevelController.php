<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDegreeLevelRequest;
use App\Models\DegreeLevel;
use Illuminate\Support\Facades\Storage;

class DegreeLevelController extends Controller
{
    public function index()
    {
        $degreeLevels = DegreeLevel::latest()->get();
        return view('degree_levels.index', compact('degreeLevels'));
    }

    public function create()
    {
        return view('degree_levels.create');
    }

    public function store(StoreDegreeLevelRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('degree_levels', 'public');
        }

        DegreeLevel::create($validated);

        return redirect()->route('degree_levels.index')->with('success', 'Degree level created successfully.');
    }

    public function edit(DegreeLevel $degreeLevel)
    {
        return view('degree_levels.edit', compact('degreeLevel'));
    }

    public function update(StoreDegreeLevelRequest $request, DegreeLevel $degreeLevel)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($degreeLevel->image) {
                Storage::disk('public')->delete($degreeLevel->image);
            }

            $validated['image'] = $request->file('image')->store('degree_levels', 'public');
        }

        $degreeLevel->update($validated);

        return redirect()->route('degree_levels.index')->with('success', 'Degree level updated successfully.');
    }

    public function destroy(DegreeLevel $degreeLevel)
    {
        if ($degreeLevel->image) {
            Storage::disk('public')->delete($degreeLevel->image);
        }

        $degreeLevel->delete();

        return redirect()->route('degree_levels.index')->with('success', 'Degree level deleted successfully.');
    }
}
