<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index() {
        $pages = 'manajemenKelas';
        $subpages = 'nilai';
        return view('admin.nilai', compact('pages', 'subpages'));
    }
}
