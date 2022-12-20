<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Ekstrakurikuler;
use App\Models\Prestasi;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $pages = 'dashboard';
        $subpages = 'dashboard';
        $user = User::count();
        $siswa = Siswa::count();
        $guru = Guru::count();
        $kelas = Kelas::count();
        $mapel = Mapel::count();
        $ekskul = Ekstrakurikuler::count();

        return view('admin.dashboard',compact(
            'pages',
            'subpages',
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
        $siswa = Siswa::join('users', 'siswas.user', '=', 'users.uuid')
        ->join('user_profiles', 'user_profiles.user', '=', 'users.uuid')
        ->where('siswas.user', Auth::user()->uuid)->first();
        $prestasis = Prestasi::join('siswas', 'siswas.NISN', '=', 'prestasis.siswa')
        ->where('siswas.user', Auth::user()->uuid)->get();
        $ekskul = Ekstrakurikuler::join('ekstrakurikuler_siswas', 'ekstrakurikuler_siswas.ekstrakurikuler', '=', 'ekstrakurikulers.ekstrakurikuler_id')
        ->join('kontrak_semesters', 'kontrak_semesters.kontrak_semester_id', '=', 'ekstrakurikuler_siswas.kontrak_siswa')
        ->join('siswas', 'siswas.NISN', '=', 'kontrak_semesters.siswa')
        ->where('siswas.user', Auth::user()->uuid)->get();
        return view('siswa.dashboard', [
            'pages'=>$pages,
            'siswa' => $siswa,
            'prestasis' => $prestasis,
            'ekskul' => $ekskul
        ]);
    }

    public function guru()
    {
        $pages = 'dashboardGuru';
        $listKelas = DB::table('list_kelas_guru')->where('guru', auth()->user()->gurus->NIP)->get();
        return view('guru.dashboard', compact("pages","listKelas"));
    }

    public function login()
    {
        $pages = 'login';
        return view('auth.login', [
            'pages'=>$pages
        ]);
    }
}
