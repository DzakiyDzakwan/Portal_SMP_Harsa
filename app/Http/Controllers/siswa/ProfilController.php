<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function profilSiswa()
    {
        $pages = 'profilSiswa';
        return view('siswa.profil', [
            'pages' => $pages
        ]);
    }

    public function editProfilSiswa()
    {
        $pages = 'editProfilSiswa';
        return view('siswa.editProfil', [
            'pages' => $pages
        ]);
    }
}
