<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogController extends Controller
{
    
    public function user() {
        $pages = 'history';
        return  view('admin.logusers', [
            'pages' => $pages,
        ]);
    }

    public function siswa() {
        $pages = 'history';
        return  view('admin.logsiswa', [
            'pages' => $pages,
        ]);
    }

    public function guru() {
        $pages = 'history';
        return  view('admin.logguru', [
            'pages' => $pages,
        ]);
    }

    public function kelas() {
        $pages = 'history';
        return  view('admin.logkelas', [
            'pages' => $pages,
        ]);
    }

    public function mapel() {
        $pages = 'history';
        return  view('admin.logmapel', [
            'pages' => $pages,
        ]);
    }

}
