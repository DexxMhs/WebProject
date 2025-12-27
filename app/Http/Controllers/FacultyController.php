<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFacultyRequest;
use App\Http\Requests\UpdateFacultyRequest;
use App\Models\Faculty;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacultyController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('view_faculties');
        $faculties = Faculty::latest()->get();
        return view('dashboard.admin.faculties.index', compact('faculties'));
    }

    public function create()
    {
        $this->authorize('create_faculties');
        return view('dashboard.admin.faculties.create');
    }

    public function store(StoreFacultyRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('faculties', 'public');
        }

        Faculty::create($validated);

        return redirect()->route('dashboard.faculties.index')->with('success', 'Faculty created successfully.');
    }

    public function edit(Faculty $faculty)
    {
        $this->authorize('edit_faculties');
        return view('dashboard.admin.faculties.edit', compact('faculty'));
    }

    public function update(UpdateFacultyRequest  $request, Faculty $faculty)
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

        return redirect()->route('dashboard.faculties.index')->with('success', 'Faculty updated successfully.');
    }

    public function destroy(Faculty $faculty)
    {
        $this->authorize('delete_faculties');
        if ($faculty->image) {
            Storage::disk('public')->delete($faculty->image);
        }

        $faculty->delete();

        return redirect()->route('dashboard.faculties.index')->with('success', 'Faculty deleted successfully.');
    }
}
