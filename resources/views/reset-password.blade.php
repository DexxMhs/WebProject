@extends('layouts.login-form')

@section('login')

<div class="login-form">
    <form action="{{ route('password.update') }}" method="POST">
        @csrf

        @include('partials.message')

        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ request('email') }}">

        <div class="form-group">
            <label>Masukkan Password Baru</label>
            <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
        </div>
        <div class="form-group">
            <label>Konfirmasi Password Baru</label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="Masukkan Password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Reset Password</button>
    </form>
</div>

@endsection