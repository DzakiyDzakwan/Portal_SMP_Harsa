<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogController extends Controller
{
    
    public function user() {
        $pages = 'history';
        return  view('logusers', [
            'pages' => $pages,
        ]);
    }

}
