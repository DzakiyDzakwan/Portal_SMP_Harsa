<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function user() {
       //Code Here
       dd('user');
        return view();
    }

    public function role() {
        //Code Here
        dd('role');
        return view();
    }

    public function  permission() {
        //Code Here
        dd('permission');
        return view();
    }

    public function admin() {
        //Code Here
        dd('admin');
        return view();
    }

    public function guru() {
        //Code Here
        dd('guru');
        return view();
    }

    public function siswa() {
        //Code Here
        dd('siswa');
        return view();
    }

    public function tahunAkademik() {
        //Code Here
        dd('tahun akademik');
        return view();
    }

    public function kelasSaya() {
        //code Here
        dd('Kelas Saya');
        return view();
    }

    public function mapel() {
        //Code Here
        dd('mata pelajaran');
        return view();
    }

    public function mapelGuru() {
        //Code Here
        dd('mata pelajaran guru');
        return view();
    }

    public function kelas() {
        //code Here
        dd('kelas');
        return view();
    }

    public function roster() {
        //code Here
        dd('roster');
        return view();
    }

    public function ekstrakurikuler() {
        //code Here
        dd('ekstrakurikuler');
        return view();
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

    public function sesiPenilaian() {
        //code Here
        dd('sesi Penilaian');
        return view();
    }
}
