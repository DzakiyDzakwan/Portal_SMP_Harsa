<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogActivity;
use App\Models\LogUser;
use App\Models\LogGuru;
use App\Models\LogSiswa;

class LogController extends Controller
{

    public function activity() {
        $pages = 'history';
        $logActivities = LogActivity::latest()->get();
        return view('admin.logactivity', compact('pages', 'logActivities'));
    }

    public function user() {
        $pages = 'history';
        $logUser = LogUser::latest()->get();
        return  view('admin.logusers',compact('pages', 'logUser'));
    }

    public function siswa() {
        $pages = 'history';
        $logSiswa = LogSiswa::latest()->get();
        return  view('admin.logsiswa', compact('pages', 'logSiswa'));
    }

    public function guru() {
        $pages = 'history';
        $logGuru = LogGuru::latest()->get();
        return  view('admin.logguru', compact('pages', 'logGuru'));
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
    
    public function ekskul() {
        $pages = 'history';
        return view('admin.logeskul', compact('pages'));
    }

}
