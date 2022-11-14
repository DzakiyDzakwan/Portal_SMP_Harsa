<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SPPController extends Controller
{
    public function index() {
        $pages = 'spp';
        return view('admin.spp', compact('pages'));
    }
}
