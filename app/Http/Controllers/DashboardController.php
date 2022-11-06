<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $pages = 'dashboard';
        return view('dashboard', [
            'pages'=>$pages
        ]);
    }
}
