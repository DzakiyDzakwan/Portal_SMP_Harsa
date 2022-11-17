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

    public function guru()
    {
        $pages = 'dashboardGuru';
        return view('guru.dashboard', [
            'pages'=>$pages
        ]);
    }
}
