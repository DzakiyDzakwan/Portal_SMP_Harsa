<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RaporController extends Controller
{
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
