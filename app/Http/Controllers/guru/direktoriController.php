<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class direktoriController extends Controller
{
    public function direktori(){
        $pages = 'direktori';
        return view('guru.direktori', [
            'pages' => $pages
        ]);
    }
}
