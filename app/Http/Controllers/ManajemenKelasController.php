<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManajemenKelasController extends Controller
{

    public function ekskul()
    {
        $pages = 'manajemenEkskul';
        return  view('admin.ekskul', [
            'pages' => $pages,
        ]);
    }
}
