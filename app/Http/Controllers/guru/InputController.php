<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InputController extends Controller
{
    public function pilihKelas1(){
        $pages = 'inputNilai';
        $bulan = 'Bulanan';
        $semester = 'Sem';
        return view('guru.pilih1', [
            'pages' => $pages,
            'bulan' => $bulan,
            'semester' => $semester
        ]);
    }

    public function inputNilai1(){
        $pages = 'inputNilai';
        $bulan = 'Bulanan';
        $semester = 'Sem';
        return view('guru.input1', [
            'pages' => $pages,
            'bulan' => $bulan,
            'semester' => $semester
        ]);
    }

    public function pilihKelas2(){
        $pages = 'inputNilai';
        $bulan = 'Bulan';
        $semester = 'Semester';
        return view('guru.pilih2', [
            'pages' => $pages,
            'bulan' => $bulan,
            'semester' => $semester
        ]);
    }

    public function inputNilai2(){
        $pages = 'inputNilai';
        $bulan = 'Bulan';
        $semester = 'Semester';
        return view('guru.input2', [
            'pages' => $pages,
            'bulan' => $bulan,
            'semester' => $semester
        ]);
    }


    public function inputAbsen(){
        $pages = 'inputNilai';
        return view('guru.absen', [
            'pages' => $pages
        ]);
    }
}
