<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InputController extends Controller
{
    public function inputNilai(){
        $pages = 'inputNilai';
        return view('guru.input', [
            'pages' => $pages
        ]);
    }

    public function inputAbsen(){
        $pages = 'inputNilai';
        return view('guru.absen', [
            'pages' => $pages
        ]);
    }
}
