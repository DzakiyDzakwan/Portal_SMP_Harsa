<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RosterController extends Controller
{
    public function index() {
        $pages = 'manajemenKelas';
        $subpages = 'roster';
        return view('admin.roster',compact('pages', 'subpages'));
    }
}
