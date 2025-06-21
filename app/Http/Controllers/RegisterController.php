<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('daftar', [
            'title' => "Daftar"
        ]);
    }

    // Ini berfungsi untuk INSERT DATA ke DATABASE
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:users|min:3|max:255',
            'nikktp' => 'required|unique:users|max:16',
            'username' => 'required|unique:users|min:3|max:255',
            'email' => 'required|email:dns|max:255',
            'password' => 'required|min:3'
        ]);

        // User Create adalah untuk membuat user baru yang akan di kirim ke database
        User::create($validateData);

        $request->session()->flash('success', 'Registrasi berhasil! Silahkan Login!');

        return redirect('/login');
    }
}
