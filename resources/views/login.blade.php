<!-- ngambil dari extend login -->
@extends('layouts.login-form')

@section('login')

    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if(session()->has('logingagal'))
        <div class="alert alert-danger" role="alert">
            {{ session('logingagal') }}
        </div>
    @endif
        <div class="login-form">
            
            <form action="/login" method="POST">
                @csrf
                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" required>
                    @error('email')
                    <div class="invalid-feeback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <div class="checkbox">
                    <label class="pull-right">
                        <a href="#">Lupa Password?</a>
                    </label>
                </div>
                <button type="submit" class="btn-login">LOGIN</button>
                <div class="register-link m-t-15 text-center" style="margin-top: 30px;">
                    <p>Belum memiliki akun ? <a href="/daftar">DAFTAR DISINI!</a></p>
                </div>
            </form>
        </div>
    </div>

@endsection