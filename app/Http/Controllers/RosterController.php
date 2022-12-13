<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RosterController extends Controller
{
    public function index() {
        $pages = 'manajemenKelas';
        return view('admin.roster', [
            'pages'=>$pages
        ]);
    }
}
