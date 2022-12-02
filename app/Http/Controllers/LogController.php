<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogUser;

class LogController extends Controller
{

    public function user() {
        $pages = 'history';
        $logUser = LogUser::latest()->get();
        return  view('admin.logusers',compact('pages', 'logUser'));
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

    public function tagihanSpp() {
        $pages = 'history';
        return view('admin.logspp', compact('pages'));
    }
    public function ekskul() {
        $pages = 'history';
        return view('admin.logeskul', compact('pages'));
    }

}
