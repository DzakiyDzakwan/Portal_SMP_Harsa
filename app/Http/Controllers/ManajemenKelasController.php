<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManajemenKelasController extends Controller
{
    public function mapel()
    {
        $pages = 'manajemenKelas';
        return  view('mapel', [
            'pages' => $pages,
        ]);
    }

    public function kelas()
    {
        $pages = 'manajemenKelas';
        return  view('kelas', [
            'pages' => $pages,
        ]);
    }
}
