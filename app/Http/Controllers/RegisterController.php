<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.daftar', [
            'title' => "Daftar"
        ]);
    }

    // Ini berfungsi untuk INSERT DATA ke DATABASE
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:users|min:3|max:255',
            'username' => 'required|unique:users|min:3|max:255',
            'email' => 'required|email:dns|max:255',
            'password' => 'required|min:3'
        ]);

        // Enkripsi password (wajib)
        $validateData['password'] = bcrypt($validateData['password']);

        // Buat user baru dan simpan ke variabel
        $user = User::create($validateData);

        // Cari role 'guest'
        $guestRole = Role::where('name', 'guest')->firstOrFail();

        // Update user dengan role_id
        $user->update([
            'role_id' => $guestRole->id,
        ]);

        $request->session()->flash('success', 'Registrasi berhasil! Silahkan Login!');

        return redirect('/login');
    }
}
