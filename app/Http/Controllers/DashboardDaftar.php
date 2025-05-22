<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardDaftar extends Controller
{
    public function index()
    {
        return view('dashboard-daftar',[
            "title" => "Data Registrasi"
        ]);
    }
}
