<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuruKelasController extends Controller
{
    public function index($id) {
        $pages = "listKelas";
        $kelas = DB::table('list_kelas_guru')->where('kelas_id', $id)->first();
        $sesi = DB::table("list_sesi_penilaian")->where('status', "Aktif")->first();
        return view('guru.kelas', compact('pages', 'kelas', 'sesi'));

    }
}
