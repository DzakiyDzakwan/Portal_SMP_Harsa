<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuruKelasController extends Controller
{
    public function index($id) {
        $pages = "listKelas";
        return view('guru.kelas', compact('pages'));

    }
}
