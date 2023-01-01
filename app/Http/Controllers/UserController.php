<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\LogActivity;

class UserController extends Controller
{
    public function index() {
        $pages = 'user';
        $subpages = 'admin';

        return view('admin.users', compact('pages', 'subpages'));
    }
}
