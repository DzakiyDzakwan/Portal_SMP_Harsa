<?php

namespace App\Http\Controllers;

use App\Models\MapelGuru;
use Illuminate\Http\Request;

class MapelGuruController extends Controller
{
    public function index()
    {
        $pages = 'manajemenKelas';
        $subpages = 'mapelguru';
        $mapelguru = MapelGuru::all();
        return view('admin.mapelguru', compact('pages', 'subpages', 'mapelguru'));
    }
}
