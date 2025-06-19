<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Password;

use Illuminate\Http\Request;

class ForgotPassword extends Controller
{
    public function index()
    {
        return view('auth.forgot-password', [
            'title' => 'Lupa Password'
        ]);
    }

    public function resetpasswordrequest(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        // dd($request->only('email'));
        // dd($status);
        // dd(Password::ResetLinkSent);
        return $status === Password::ResetLinkSent
            ? back()->with(['status' => 'Email berhasil di kirim ke email anda, silhakan cek email anda'])
            : back()->withErrors(['email' => 'Email yang anda masukkan tidak terdaftar di database kami!']);
    }
}
