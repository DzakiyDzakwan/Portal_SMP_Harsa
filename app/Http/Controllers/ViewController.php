<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function kelasSaya()
    {
        $menu = 'walikelas';
        $kelas = DB::table('list_kelas')->where('NUPTK', auth()->user()->gurus->NUPTK)->first();

        return view('sekolah.walikelas', compact('menu', 'kelas'));
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

    public function kelas()
    {
        $menu = 'sekolah';
        return view('sekolah.kelas', compact('menu'));
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

    public function ekstrakurikuler()
    {
        $menu = 'sekolah';
        return view('sekolah.ekskul', compact('menu'));
    }

    public function ekstrakurikulerSiswa()
    {
        $menu = 'sekolah';
        return view('sekolah.ekskulsiswa', compact('menu'));
    }

    public function nilaiEkstrakurikuler()
    {
        $menu = 'sekolah';
        dd('nilai Ekstrakurikuler');
        return view('sekolah.nilai_ekskul', compact('menu'));
    }
}
