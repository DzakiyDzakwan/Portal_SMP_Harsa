<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;

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

    public function changePassword()
    {
        $pages = 'changePassword';
        return view('siswa.change-password', [
            'pages' => $pages
        ]);
    }

    public function updateProfilSiswa(Request $request)
    {   
        
    }
}
