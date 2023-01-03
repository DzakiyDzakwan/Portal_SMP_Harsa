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
        $menu = 'history';
        $subpages = 'logActivity';
        $logActivities = DB::table('table_log_activities')
        ->latest()
        ->get();
        return view('audit.logactivity', compact('menu', 'logActivities', 'subpages'));
    }

    public function user() {
        $menu = 'history';
        $subpages = 'logUser';
        $logUser = DB::table('table_log_users')
        ->latest()
        ->get();
        return  view('audit.logusers',compact('menu', 'subpages', 'logUser'));
    }

    public function siswa() {
        $menu = 'history';
        $subpages = 'logSiswa';
        $logSiswa = DB::table('table_log_siswas')
        ->latest()
        ->get();
        return  view('audit.logsiswa', compact('menu', 'subpages', 'logSiswa'));
    }

    public function guru() {
        $menu = 'history';
        $subpages = 'logGuru';
        $logGuru = DB::table('table_log_gurus')
        ->latest()
        ->get();
        return  view('audit.logguru', compact('menu', 'subpages', 'logGuru'));
    }

    public function kelas() {
        $menu = 'history';
        $subpages = 'logKelas';
        $logKelas = DB::table('table_log_Kelas')
        ->latest()
        ->get();
        return  view('audit.logkelas', compact('menu', 'subpages', 'logKelas'));
    }

    public function mapel() {
        $menu = 'history';
        $subpages = 'logMapel';
        $logMapel = DB::table('table_log_Mapels')
        ->latest()
        ->get();
        return  view('audit.logmapel', compact('menu', 'subpages', 'logMapel'));
    }
    
    public function ekskul() {
        $menu = 'history';
        $subpages = 'logEkskul';
        $logEkskul = DB::table('table_log_ekstrakurikulers')
        ->latest()
        ->get();
        return view('audit.logeskul', compact('menu', 'subpages', 'logEkskul'));
    }

    public function roster() {
        $menu = 'history';
        $subpages = 'logRoster';
        $logRoster = DB::table('log_rosters')
        ->latest()
        ->get();
        return view('audit.logroster', compact('menu', 'subpages', 'logRoster'));
    }

    public function profiles() {
        $menu = 'history';
        $subpages = 'logProfiles';
        $logProfiles = DB::table('table_log_profiles')
        ->latest()
        ->get();
        return view('audit.logprofiles', compact('menu', 'subpages', 'logProfiles'));
    }

    public function nilai() {
        $menu = 'history';
        $subpages = 'logNilai';
        $logNilai = DB::table('table_log_nilais')
        ->latest()
        ->get();
        return view('audit.lognilai', compact('menu', 'subpages', 'logNilai'));
    }

    public function prestasi() {
        $menu = 'history';
        $subpages = 'logPrestasi';
        $logPrestasi = DB::table('table_log_prestasis')
        ->latest()
        ->get();
        return view('audit.logprestasi', compact('menu', 'subpages', 'logPrestasi'));
    }

    public function ekskulSiswa() {
        $menu = 'history';
        $subpages = 'logEkskulSiswa';
        $logEkskulSiswa = DB::table('table_log_ekstrakurikuler_siswas')
        ->latest()
        ->get();
        return view('audit.logekskulsiswa', compact('menu', 'subpages', 'logEkskulSiswa'));
    }

    public function kontrak() {
        $menu = 'history';
        $subpages = 'logKontrak';
        $logKontrak = DB::table('table_log_kontraks')
        ->latest()
        ->get();
        return view('audit.logkontrak', compact('menu', 'subpages', 'logKontrak'));
    }

}
