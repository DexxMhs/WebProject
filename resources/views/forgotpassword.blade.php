@extends('layouts.login-form')

@section('login')

<div class="login-form">
    <form action="{{ route('password.email') }}" method="POST">
        @csrf

        @include('partials.message')

        <div class="form-group">
            <label>Email address</label>
            <input type="email" class="form-control" name="email" placeholder="Email" required>
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Reset Password</button>
    </form>
</div>

@endsection