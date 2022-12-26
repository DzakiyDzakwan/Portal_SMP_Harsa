<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function user() {
       //Code Here
       dd('user');
        return view('user.user');
    }

    public function role() {
        //Code Here
        dd('role');
        return view('user.role');
    }

    public function  permission() {
        //Code Here
        dd('permission');
        return view('user.permission');
    }

    public function admin() {
        //Code Here
        dd('admin');
        return view('user.admin');
    }

    public function guru() {
        //Code Here
        dd('guru');
        return view('user.guru');
    }

    public function siswa() {
        //Code Here
        dd('siswa');
        return view('user.siswa');
    }

    public function tahunAkademik() {
        //Code Here
        dd('tahun akademik');
        return view('sekolah.tahunakademik');
    }

    public function kelasSaya() {
        //code Here
        dd('Kelas Saya');
        return view('sekolah.walikelas');
    }

    public function mapel() {
        //Code Here
        dd('mata pelajaran');
        return view('sekolah.mapel');
    }

    public function mapelGuru() {
        //Code Here
        dd('mata pelajaran guru');
        return view('sekolah.mapelguru');
    }

    public function kelas() {
        //code Here
        dd('kelas');
        return view('sekolah.kelas');
    }

    public function roster() {
        //code Here
        dd('roster');
        return view('sekolah.roster');
    }

    public function sesiPenilaian() {
        //code Here
        dd('sesi Penilaian');
        return view('sekolah.sesinilai');
    }

    public function ekstrakurikuler() {
        //code Here
        dd('ekstrakurikuler');
        return view('sekolah.ekskul');
    }

    public function ekstrakurikulerSiswa() {
        //code Here
        dd('ekstrakurikuler siswa');
        return view();
    }

    public function nilaiEkstrakurikuler() {
        //code Here
        dd('nilai Ekstrakurikuler');
        return view();
    }
}
