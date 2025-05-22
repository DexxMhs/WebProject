<!-- ngambil dari extend layout dashboard -->
@extends('layouts.dashboard-main')

@section('container')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h1 class="box-title">Selamat Datang, {{ $name }}</h1>
            </div>
            <div class="card-body">
                <img src="{{ asset('images/people-hai.png') }}" alt="people-hai" width="500px">
                <h4>Wahh... Halaman kamu masih kosong nih.</h4>
                <h4>Yukk.. Segera daftar di menu "Data Registrasi" atau daftar <a href="/dashboard-daftar">Disini!</a></h4>
            </div>
        </div>
    </div>
</div>
@endsection