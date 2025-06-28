<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLecturerRequest;
use App\Http\Requests\UpdateLecturerRequest;
use App\Models\Building;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Faculty;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class LecturerController extends Controller
{
    public function index()
    {
        $lecturers = Lecturer::with('faculty')->latest()->get();
        return view('dashboard.admin.lecturers.index', compact('lecturers'));
    }

    public function show(Lecturer $lecturer)
    {
        return view('dashboard.admin.lecturers.show', compact('lecturer'));
    }

    public function create()
    {
        $faculties = Faculty::all();
        $courses = Course::all();
        $buildings = Building::all();
        return view('dashboard.admin.lecturers.create', compact('faculties', 'courses', 'buildings'));
    }

    public function store(StoreLecturerRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('lecturers', 'public');
        }

        // Cari role 'lecturer'
        $lecturerRole = Role::where('name', 'lecturer')->firstOrFail();

        // Buat akun user terlebih dahulu
        $user = User::create([
            'name' => $validated['name'],
            'role_id' => $lecturerRole->id,
            'username' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make('123456'), // bisa diganti random + kirim email jika mau
        ]);

        // Tambahkan relasi user_id ke lecturer
        $validated['user_id'] = $user->id;

        $lecturer = Lecturer::create($validated);
        $lecturer->courses()->sync($request->input('course_ids', []));
        $lecturer->buildings()->sync($request->input('building_ids', []));

        return redirect()->route('dashboard.lecturers.index')->with('success', 'Lecturer created successfully.');
    }

    public function edit(Lecturer $lecturer)
    {
        $faculties = Faculty::all();
        $courses = Course::all();
        $buildings = Building::all();
        return view('dashboard.admin.lecturers.edit', compact('lecturer', 'faculties', 'courses', 'buildings'));
    }

    public function update(UpdateLecturerRequest $request, Lecturer $lecturer)
    {
        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            if ($lecturer->photo) {
                Storage::disk('public')->delete($lecturer->photo);
            }

            $validated['photo'] = $request->file('photo')->store('lecturers', 'public');
        }

        $lecturer->update($validated);
        $lecturer->courses()->sync($request->input('course_ids', []));
        $lecturer->buildings()->sync($request->input('building_ids', []));


        return redirect()->route('dashboard.lecturers.index')->with('success', 'Lecturer updated successfully.');
    }

    public function destroy(Lecturer $lecturer)
    {
        if ($lecturer->photo) {
            Storage::disk('public')->delete($lecturer->photo);
        }

        $lecturer->delete();

        return redirect()->route('dashboard.lecturers.index')->with('success', 'Lecturer deleted successfully.');
    }
}
