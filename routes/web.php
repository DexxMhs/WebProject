<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('prg', function () {
    return view('prg');
})->name('prg');

Route::get('fk', function () {
    return view('fk');
})->name('fk');
