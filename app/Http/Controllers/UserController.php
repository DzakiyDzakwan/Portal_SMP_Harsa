<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $pages = 'user';
        return view('users', [
            'pages' => $pages
        ]);
    }
}
