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
        $submenu = 'user';
        return view('user.user', compact('menu', 'submenu'));
    }

    public function role()
    {
        $menu = 'manajemenuser';
        $submenu = 'role';
        return view('user.role', compact('menu', 'submenu'));
    }

    public function  permission()
    {
        $menu = 'manajemenuser';
        $submenu = 'permission';
        return view('user.permission', compact('menu', 'submenu'));
    }

    public function admin()
    {
        $menu = 'manajemenakun';
        $submenu = 'admin';

        return view('user.admin', compact('menu', 'submenu'));
    }

    public function guru()
    {
        $menu = 'manajemenakun';
        $submenu = 'guru';
        return view('user.guru', compact('menu', 'submenu'));
    }

    public function siswa()
    {
        $menu = 'manajemenakun';
        $submenu = 'siswa';
        return view('user.siswa', compact('menu', 'submenu'));
    }

    public function tahunAkademik()
    {
        $menu = 'tahunakademik';
        $submenu = 'tahun-akademik';
        return view('sekolah.tahunakademik', compact('menu', 'submenu'));
    }

    public function kelasSaya()
    {
        $menu = 'kelassaya';
        $submenu = 'kelas-saya';

        $kelas = DB::table('list_kelas_aktif')->where('NUPTK', auth()->user()->gurus->NUPTK)->first();

        return view('sekolah.walikelas', compact('menu', 'submenu' ,'kelas'));
    }

    public function mapel()
    {
        $menu = 'manajemenmapel';
        $submenu = 'mapel';
        return view('sekolah.mapel', compact('menu', 'submenu'));
    }

    public function mapelGuru()
    {
        $menu = 'manajemenmapel';
        $submenu = 'mapel-guru';
        return view('sekolah.mapelguru', compact('menu', 'submenu'));
    }

    public function waliKelas()
    {
        $menu = 'manajemenkelas';
        $submenu = 'wali-kelas';
        return view('sekolah.wali', compact('menu', 'submenu'));
    }

    public function kelas()
    {
        $menu = 'manajemenkelas';
        $submenu = 'kelas';
        return view('sekolah.kelas', compact('menu', 'submenu'));
    }

    public function kelasAktif()
    {
        $menu = 'manajemenkelas';
        $submenu = 'kelas-aktif';
        return view('sekolah.kelasaktif', compact('menu', 'submenu'));
    }

    public function roster()
    {
        $menu = 'manajemenkelas';
        $submenu = 'roster';
        return view('sekolah.roster', compact('menu', 'submenu'));
    }

    public function sesiPenilaian()
    {
        $menu = 'manajemennilai';
        $submenu = 'sesi';
        return view('sekolah.sesinilai', compact('menu', 'submenu'));
    }

    public function konfirmasiNilai()
    {
        $menu = 'manajemennilai';
        $submenu = 'konfirmasi';

        return view('sekolah.konfirmasinilai', compact('menu', 'submenu'));
    }

    public function kelasGuru($id)
    {
        $menu = "manajemennilai";
        $submenu = 'kelas-guru-'.$id;

        $kelas = DB::table('list_kelas_guru')->where('guru', auth()->user()->gurus->NUPTK)->where('kelas', $id)->first();
        $sesi = DB::table("list_sesi_penilaian")->whereRaw('status = "aktif" COLLATE utf8mb4_general_ci')->first();
        return view('sekolah.kelasguru', compact('menu', 'submenu', 'kelas', 'sesi'));
    }

    public function pembinaEkstrakurikuler()
    {
        $menu = 'manajemenekskul';
        $submenu = 'pembina';

        return view('sekolah.pembina_ekskul', compact('menu', 'submenu'));
    }

    public function ekstrakurikuler()
    {
        $menu = 'manajemenekskul';
        $submenu = 'ekstrakurikuler';

        return view('sekolah.ekskul', compact('menu', 'submenu'));
    }

    public function ekstrakurikulerSiswaAdmin()
    {
        $menu = 'manajemenekskul';
        $submenu = 'ekstrakurikuler-siswa';

        return view('sekolah.ekskulsiswaadmin', compact('menu', 'submenu'));
    }

    public function ekstrakurikulerSiswaPembina()
    {
        $menu = 'manajemenekskul';
        $submenu = 'ekstrakurikuler-pembina';

        return view('sekolah.ekskulsiswapembina', compact('menu', 'submenu'));
    }

    public function ekstrakurikulerSiswa()
    {
        $menu = 'ekstrakurikuler';
        $submenu = 'ekstrakurikuler-siswa';
        return view('sekolah.ekskulsiswa', compact('menu', 'submenu'));
    }

    public function nilaiEkstrakurikuler()
    {
        $menu = 'manajemenekskul';
        $submenu = 'nilai-ekskul';
        $kelas = DB::table('list_ekstrakurikuler')->where('penanggung_jawab', auth()->user()->gurus->NUPTK)->where('id', $id)->first();
        $sesi = DB::table("list_sesi_penilaian")->whereRaw('status = "aktif" COLLATE utf8mb4_general_ci')->first();
        return view('sekolah.kelasekskul', compact('menu', 'kelas', 'sesi'));
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
        $submenu = 'rapor-'.$grade;
        return view('siswa.rapor', compact('menu', 'submenu', 'kontrak', 'grade'));
    }
}
