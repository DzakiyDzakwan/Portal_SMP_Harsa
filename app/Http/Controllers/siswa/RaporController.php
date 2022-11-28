<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RaporController extends Controller
{
    public function rapor()
    {
        $pages = 'rapor';
        return view('siswa.rapor',[
            'pages' => $pages
        ]);
    }

    public function ganjil7()
    {
        $pages = 'pilih-rapor-ganjil-7';
        return view('siswa.pilih-rapor-ganjil-7',[
            'pages' => $pages
        ]);
    }

    public function genap7()
    {
        $pages = 'pilih-rapor-genap-7';
        return view('siswa.pilih-rapor-genap-7',[
            'pages' => $pages
        ]);
    }

    public function bulanan()
    {
        $pages = 'rapor-bulanan';
        return view('siswa.rapor-bulanan',[
            'pages' => $pages
        ]);
    }

    public function semester()
    {
        $pages = 'rapor-semester';
        return view('siswa.rapor-semester',[
            'pages' => $pages
        ]);
    }
}
