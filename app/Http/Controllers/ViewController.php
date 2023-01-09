<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\KontrakSemester;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public function user()
    {
        $menu = 'manajemenuser';
        return view('user.user', compact('menu'));
    }

    public function role()
    {
        $menu = 'manajemenuser';
        return view('user.role', compact('menu'));
    }

    public function  permission()
    {
        $menu = 'manajemenuser';
        return view('user.permission', compact('menu'));
    }

    public function admin()
    {
        $menu = 'manajemenakun';
        $submenus = 'admin';

        // dd('admin');
        return view('user.admin', compact('menu'));
    }

    public function guru()
    {
        $menu = 'manajemenakun';
        return view('user.guru', compact('menu'));
    }

    public function siswa()
    {
        $menu = 'manajemenakun';
        // dd('siswa');
        return view('user.siswa', compact('menu'));
    }

    public function tahunAkademik()
    {
        $menu = 'tahunakademik';
        return view('sekolah.tahunakademik', compact('menu'));
    }

    public function mapel()
    {
        $menu = 'manajemenmapel';
        //dd('mata pelajaran');
        return view('sekolah.mapel', compact('menu'));
    }

    public function mapelGuru()
    {
        $menu = 'manajemenmapel';
        //dd('mata pelajaran guru');
        return view('sekolah.mapelguru', compact('menu'));
    }

    public function waliKelas()
    {
        $menu = 'sekolah';
        return view('sekolah.wali', compact('menu'));
    }

    public function kelas()
    {
        $menu = 'sekolah';
        return view('sekolah.kelas', compact('menu'));
    }

    public function kelasAktif()
    {
        $menu = 'sekolah';
        return view('sekolah.kelasaktif', compact('menu'));
    }

    public function roster()
    {
        $menu = 'kelas';
        //dd('roster');
        return view('sekolah.roster', compact('menu'));
    }

    public function sesiPenilaian()
    {
        $menu = 'sekolah';
        //dd('sesi Penilaian');
        return view('sekolah.sesinilai', compact('menu'));
    }

    public function konfirmasiNilai()
    {
        $menu = 'sekolah';
        //dd('sesi Penilaian');
        return view('sekolah.konfirmasinilai', compact('menu'));
    }

    public function kelasSaya()
    {
        $menu = 'walikelas';
        $kelas = DB::table('list_kelas_aktif')->where('NUPTK', auth()->user()->gurus->NUPTK)->first();

        return view('sekolah.walikelas', compact('menu', 'kelas'));
    }

    public function kelasGuru($id)
    {
        $menu = "nilai";
        $kelas = DB::table('list_kelas_guru')->where('guru', auth()->user()->gurus->NUPTK)->where('kelas', $id)->first();
        $sesi = DB::table("list_sesi_penilaian")->whereRaw('status = "aktif" COLLATE utf8mb4_general_ci')->first();
        return view('sekolah.kelasguru', compact('menu', 'kelas', 'sesi'));
    }
    
    public function pembinaEkstrakurikuler()
    {
        $menu = 'sekolah';
        return view('sekolah.pembina_ekskul', compact('menu'));
    }

    public function ekstrakurikuler()
    {
        $menu = 'ekstrakurikuler';
        return view('sekolah.ekskul', compact('menu'));
    }

    public function ekstrakurikulerSiswaAdmin()
    {
        $menu = 'sekolah-siswa';
        return view('sekolah.ekskulsiswaadmin', compact('menu'));
    }
    
    public function ekstrakurikulerSiswaPembina()
    {
        $menu = 'sekolah-siswa';
        return view('sekolah.ekskulsiswapembina', compact('menu'));
    }

    public function ekstrakurikulerSiswa()
    {
        $menu = 'sekolah-siswa';
        return view('sekolah.ekskulsiswa', compact('menu'));
    }

    public function nilaiEkstrakurikuler()
    {
        $menu = 'sekolah-siswa';
        dd('nilai Ekstrakurikuler');
        return view('sekolah.nilai_ekskul', compact('menu'));
    }



    public function rapotSiswa($grade)
    {
        $kontrak = KontrakSemester::where('grade', $grade)->where('siswa', Auth::user()->siswas->NISN)->get();
        /* $kontrak = DB::table('kontrak_semesters')
            ->join('siswas', 'siswas.NISN', '=', 'kontrak_semesters.siswa')
            ->join('nilais', 'nilais.kontrak_siswa', '=', 'kontrak_semesters.kontrak_semester_id')
            ->join('sesi_penilaians', 'sesi_penilaians.sesi_id', '=', 'nilais.sesi')
            ->join('mapels', 'mapels.mapel_id', '=', 'nilais.mapel')
            ->where('siswas.user', Auth::user()->uuid)
            ->get(); */
        // dd($kontrak);
        $menu = 'rapor';
        return view('siswa.rapor', compact('menu', 'kontrak', 'grade'));
    }
}
