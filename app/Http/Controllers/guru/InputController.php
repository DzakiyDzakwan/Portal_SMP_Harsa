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


    public function inputAbsen1(){
        $pages = 'inputAbsen';
        $ganjil = 'ganjil';
        $genap = 'g';
        return view('guru.absen1', [
            'pages' => $pages,
            'ganjil' => $ganjil,
            'genap' => $genap
        ]);
    }
    public function inputAbsen2(){
        $pages = 'inputAbsen';
        $genap = 'genap';
        $ganjil = 'g';
        return view('guru.absen2', [
            'pages' => $pages,
            'genap' => $genap,
            'ganjil' => $ganjil
        ]);
    }
    
    public function rekapAbsen(){
        $pages = 'rekapAbsen';
        return view('guru.absen3', [
            'pages' => $pages
        ]);
    }
}
