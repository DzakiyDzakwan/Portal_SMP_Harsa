<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function profilGuru()
    {
        $pages = 'profilGuru';
        return view('guru.profile', [
            'pages' => $pages
        ]);
    }

    public function editProfilGuru()
    {
        $pages = 'editProfilGuru';
        return view('guru.editprofile', [
            'pages' => $pages
        ]);
    }
}
