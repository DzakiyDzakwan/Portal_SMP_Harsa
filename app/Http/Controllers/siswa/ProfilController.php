<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;

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

    public function updateProfilSiswa(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            
            'kelas_awal' => '',
            'anak_ke' => '',
            'nama_ayah' => '',
            'pekerjaan_ayah' => '',
            'nama_ibu' => '',
            'pekerjaan_ibu' => '',
            'alamat_orangtua' => '',
            'telepon_orangtua' => '',
            'nama_wali' => '',
            'pekerjaan_wali' => '',
            'telepon_wali' => '',
        ]);
        // dd($validated);
        Siswa::where('user', auth()->user()->uuid)->update($validated);
        return "oke";
    }
}
