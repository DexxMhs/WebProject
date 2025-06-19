@extends('auth.layouts.login-form')

@section('login')
    <div class="login-form">
        <form action="{{ route('auth.password.email') }}" method="POST">
            @csrf

            @include('auth.partials.message')

            <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Reset Password</button>
        </form>
    </div>
@endsection
