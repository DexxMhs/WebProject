<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardDaftar;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;



// Bisa di isi dengan halaman HOMEPAGE


// Rute menuju ke halaman LOGIN melalui Controller
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Rute Menuju ke halaman DAFTAR melalui Controller
Route::get('/daftar', [RegisterController::class, 'index'])->middleware('guest');

// Rute request ketika user memasukan data validasi 
Route::post('/daftar', [RegisterController::class, 'store']);

// Rute unutuk menuju Dashboard melalui Contorller
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// Rute untuk menuju Dashboard-Daftar mellaui Controller
Route::get('/dashboard-daftar', [DashboardDaftar::class, 'index'])->middleware('auth');