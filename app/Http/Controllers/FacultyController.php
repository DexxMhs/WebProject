<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFacultyRequest;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacultyController extends Controller
{
    public function index()
    {
        $faculties = Faculty::latest()->get();
        return view('dashboard.admin.faculties.index', compact('faculties'));
    }

    public function create()
    {
        return view('dashboard.admin.faculties.create');
    }

    public function store(StoreFacultyRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('faculties', 'public');
        }

        Faculty::create($validated);

        return redirect()->route('dashboard.admin.faculties.index')->with('success', 'Faculty created successfully.');
    }

    public function edit(Faculty $faculty)
    {
        return view('dashboard.admin.faculties.edit', compact('faculty'));
    }

    public function update(StoreFacultyRequest $request, Faculty $faculty)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($faculty->image) {
                Storage::disk('public')->delete($faculty->image);
            }

            $validated['image'] = $request->file('image')->store('faculties', 'public');
        }

        $faculty->update($validated);

        return redirect()->route('dashboard.admin.faculties.index')->with('success', 'Faculty updated successfully.');
    }

    public function destroy(Faculty $faculty)
    {
        if ($faculty->image) {
            Storage::disk('public')->delete($faculty->image);
        }

        $faculty->delete();

        return redirect()->route('dashboard.admin.faculties.index')->with('success', 'Faculty deleted successfully.');
    }
}
