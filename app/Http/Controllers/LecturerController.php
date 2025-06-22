<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLecturerRequest;
use App\Models\Lecturer;
use App\Models\Faculty;
use Illuminate\Support\Facades\Storage;

class LecturerController extends Controller
{
    public function index()
    {
        $lecturers = Lecturer::with('faculty')->latest()->get();
        return view('lecturers.index', compact('lecturers'));
    }

    public function create()
    {
        $faculties = Faculty::all();
        return view('lecturers.create', compact('faculties'));
    }

    public function store(StoreLecturerRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('lecturers', 'public');
        }

        Lecturer::create($validated);

        return redirect()->route('lecturers.index')->with('success', 'Lecturer created successfully.');
    }

    public function edit(Lecturer $lecturer)
    {
        $faculties = Faculty::all();
        return view('lecturers.edit', compact('lecturer', 'faculties'));
    }

    public function update(StoreLecturerRequest $request, Lecturer $lecturer)
    {
        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            if ($lecturer->photo) {
                Storage::disk('public')->delete($lecturer->photo);
            }

            $validated['photo'] = $request->file('photo')->store('lecturers', 'public');
        }

        $lecturer->update($validated);

        return redirect()->route('lecturers.index')->with('success', 'Lecturer updated successfully.');
    }

    public function destroy(Lecturer $lecturer)
    {
        if ($lecturer->photo) {
            Storage::disk('public')->delete($lecturer->photo);
        }

        $lecturer->delete();

        return redirect()->route('lecturers.index')->with('success', 'Lecturer deleted successfully.');
    }
}
