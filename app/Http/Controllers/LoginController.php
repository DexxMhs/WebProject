<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login', [
            "title" => "Login"
        ]);
    }

    public function authenticate(Request $request)
    {
        // mengecek apakah user sudah ada di database atau tidak
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);
        // percobaan user ketika login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // jika berhasil maka masuk ke halaman dashboard
            return redirect()->route('dashboard.home');
        }


        // jika gagal akan ada pesan gagal login
        return back()->with('logingagal', 'Username atau Password Salah!');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('auth.login');
    }
}
