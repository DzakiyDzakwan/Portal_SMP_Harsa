<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Prestasi;
use App\Models\Ekstrakurikuler;
use App\Models\EkstrakurikulerSiswa;


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
        $tahunAkademik = DB::table('list_tahun_ajaran')->whereRaw('status = "aktif" COLLATE utf8mb4_general_ci')->first();
        if($tahunAkademik != null) {
            $tahunAjaranAktif = $tahunAkademik->tahun_ajaran;
            $semesterAktif = $tahunAkademik->semester;
        }
        $sesi = DB::table("list_sesi_penilaian")->select("nama_sesi")->whereRaw('status = "aktif" COLLATE utf8mb4_general_ci AND tahun_ajaran_aktif = "'.$tahunAjaranAktif .'" AND semester_aktif = "'.$semesterAktif .'"')->first();
        $kelas = DB::table('list_kelas_guru')->where('guru', auth()->user()->gurus->NUPTK)->get();
        $roster = DB::table('list_roster_guru')->where('guru', auth()->user()->gurus->NUPTK)->get();

        return view('guru.dashboard', compact("menu", "jumlah", "tahunAkademik", "sesi", "kelas", "roster"));
    }

    public function indexsiswa() {
        $menu = 'dashboard';
        // $roster = DB::table('list_roster_siswa')->where('kelas', Auth::user()->siswas->kelas)->get();
        // $siswa = Siswa::join('users', 'siswas.user', '=', 'users.uuid')
        // ->join('user_profiles', 'user_profiles.user', '=', 'users.uuid')
        // ->where('siswas.user', Auth::user()->uuid)->first();
        $prestasi = Prestasi::where('siswa',Auth::user()->siswas->NISN)->get();
        $ekskul = EkstrakurikulerSiswa::join('ekstrakurikulers', 'ekstrakurikuler_id', '=', 'ekstrakurikuler_siswas.ekstrakurikuler')
        ->where('siswa',Auth::user()->siswas->NISN)
        ->get();
        $roster = DB::table('list_roster_guru')->join('list_siswa_kelas', 'list_siswa_kelas.kelas', '=', 'list_roster_guru.kelas')->where('list_siswa_kelas.NISN', auth()->user()->siswas->NISN)->get();
        return view('siswa.dashboard', compact('menu', 'prestasi', 'ekskul', 'roster'));
    }
}
