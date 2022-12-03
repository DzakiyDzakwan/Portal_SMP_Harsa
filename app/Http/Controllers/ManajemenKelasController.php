<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManajemenKelasController extends Controller
{
    public function mapel() {
        $pages = 'manajemenKelas';
        return  view('admin.mapel', [
            'pages' => $pages,
        ]);
    }

    public function ekskul()
    {
        $pages = 'manajemenEkskul';
        return  view('admin.ekskul', [
            'pages' => $pages,
        ]);
    }
}
