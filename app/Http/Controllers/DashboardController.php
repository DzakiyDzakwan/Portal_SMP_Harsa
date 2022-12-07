<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Ekstrakurikuler;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $pages = 'dashboard';
        $user = User::count();
        $siswa = Siswa::count();
        $guru = Guru::count();
        $kelas = Kelas::count();
        $mapel = Mapel::count();
        $ekskul = Ekstrakurikuler::count();

        return view('admin.dashboard',compact(
            'pages',
            'user',
            'siswa',
            'guru',
            'kelas',
            'mapel',
            'ekskul'
        ));
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

    public function login()
    {
        $pages = 'login';
        return view('auth.login', [
            'pages'=>$pages
        ]);
    }
}
