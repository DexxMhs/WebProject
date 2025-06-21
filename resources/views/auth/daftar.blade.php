<!-- ngambil dari extend login -->
@extends('layouts.login-form')

@section('login')
    <div class="login-form">
        <form action="/daftar" method="POST">
            @csrf <!-- CSRF Token Berfungsi unutk mencegah CyberCross dari laravel -->
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nama Lengkap" value="{{ old('name')}}">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>NIK KTP</label>
                <input type="number" class="form-control @error('nikktp') is-invalid @enderror" name="nikktp" placeholder="NIK KTP" value="{{ old('nikktp')}}">
                @error('nikktp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>User Name</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="User Name" value="{{ old('username')}}">
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email')}}">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                @error('password')
                <div class="invalid=feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn-login">DAFTAR</button>
            <div class="register-link m-t-15 text-center" style="margin-top: 30px;">
                <p>Sudah memiliki Akun ? <a href="/login"> Login!</a></p>
            </div>
        </form>
    </div>
@endsection 