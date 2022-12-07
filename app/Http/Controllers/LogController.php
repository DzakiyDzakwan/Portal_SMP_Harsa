<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogActivity;
use App\Models\LogUser;
use App\Models\LogGuru;
use App\Models\LogSiswa;
use Illuminate\Support\Facades\DB;

class LogController extends Controller
{

    public function activity() {
        $pages = 'history';
        $logActivities = DB::table('table_log_activities')
        ->latest()
        ->get();
        return view('admin.logactivity', compact('pages', 'logActivities'));
    }

    public function user() {
        $pages = 'history';
        $logUser = DB::table('table_log_users')
        ->latest()
        ->get();
        return  view('admin.logusers',compact('pages', 'logUser'));
    }

    public function siswa() {
        $pages = 'history';
        $logSiswa = DB::table('table_log_siswas')
        ->latest()
        ->get();
        return  view('admin.logsiswa', compact('pages', 'logSiswa'));
    }

    public function guru() {
        $pages = 'history';
        $logGuru = DB::table('table_log_gurus')
        ->latest()
        ->get();
        return  view('admin.logguru', compact('pages', 'logGuru'));
    }

    public function kelas() {
        $pages = 'history';
        $logKelas = DB::table('table_log_Kelas')
        ->latest()
        ->get();
        return  view('admin.logkelas', [
            'pages' => $pages,
            'logKelas' => $logKelas
        ]);
    }

    public function mapel() {
        $pages = 'history';
        $logMapel = DB::table('table_log_Mapels')
        ->latest()
        ->get();
        return  view('admin.logmapel', [
            'pages' => $pages,
            'logMapel' => $logMapel
        ]);
    }
    
    public function ekskul() {
        $pages = 'history';
        $logEkskul = DB::table('table_log_ekstrakurikulers')
        ->latest()
        ->get();
        return view('admin.logeskul', compact('pages', 'logEkskul'));
    }

}
