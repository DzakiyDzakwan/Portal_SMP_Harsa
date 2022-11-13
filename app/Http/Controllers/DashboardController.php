<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $pages = 'dashboard';
        return view('admin.dashboard', [
            'pages'=>$pages
        ]);
    }

    public function siswa() {
        $pages = 'dashboardSiswa';
        return view('siswa.dashboard', [
            'pages'=>$pages
        ]);
    }
}
