<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\Ekstrakurikuler;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function indexguru()
    {
        $tahunAjaranAktif = "";
        $semesterAktif = "";
        $menu = 'dashboard';
        $jumlah= [
            'user' => User::withTrashed()->count(),
            'admin' => User::withTrashed()->role(['kepsek', 'wakepsek', 'admin'])->count(),
            'guru' => User::withTrashed()->role('guru')->count(),
            'siswa' => User::withTrashed()->role('siswa')->count(),
            'mapel' => Mapel::withTrashed()->count(),
            'kelas' => Kelas::count(),
            'ekskul' => Ekstrakurikuler::count(),
        ];

        dd($jumlah);
        $tahunAkademik = DB::table('list_tahun_ajaran')->whereRaw('status = "aktif" COLLATE utf8mb4_general_ci')->first();
        if($tahunAkademik != null) {
            $tahunAjaranAktif = $tahunAkademik->tahun_ajaran;
            $semesterAktif = $tahunAkademik->semester;
        }
        $sesi = DB::table("list_sesi_penilaian")->select("nama_sesi")->whereRaw('status = "aktif" COLLATE utf8mb4_general_ci AND tahun_ajaran_aktif = "'.$tahunAjaranAktif .'" AND semester_aktif = "'.$semesterAktif .'"')->first();

        return view('guru.dashboard', compact("menu", "jumlah", "tahunAkademik", "sesi"));
    }

    public function siswa() {
        $pages = 'dashboardSiswa';
        $roster = DB::table('list_roster_siswa')->where('kelas', Auth::user()->siswas->kelas)->get();
        $siswa = Siswa::join('users', 'siswas.user', '=', 'users.uuid')
        ->join('user_profiles', 'user_profiles.user', '=', 'users.uuid')
        ->where('siswas.user', Auth::user()->uuid)->first();
        $prestasi = Prestasi::where('siswa',Auth::user()->siswas->NISN)->get();
        return view('siswa.dashboard', [
            'pages'=>$pages,
            'siswa' => $siswa,
            'roster' => $roster,
            'prestasi' => $prestasi
        ]);
    }
}
