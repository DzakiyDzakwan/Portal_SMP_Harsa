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
        $subpages = 'logActivity';
        $logActivities = DB::table('table_log_activities')
        ->latest()
        ->get();
        return view('admin.logactivity', compact('pages', 'logActivities', 'subpages'));
    }

    public function user() {
        $pages = 'history';
        $subpages = 'logUser';
        $logUser = DB::table('table_log_users')
        ->latest()
        ->get();
        return  view('admin.logusers',compact('pages', 'subpages', 'logUser'));
    }

    public function siswa() {
        $pages = 'history';
        $subpages = 'logSiswa';
        $logSiswa = DB::table('table_log_siswas')
        ->latest()
        ->get();
        return  view('admin.logsiswa', compact('pages', 'subpages', 'logSiswa'));
    }

    public function guru() {
        $pages = 'history';
        $subpages = 'logGuru';
        $logGuru = DB::table('table_log_gurus')
        ->latest()
        ->get();
        return  view('admin.logguru', compact('pages', 'subpages', 'logGuru'));
    }

    public function kelas() {
        $pages = 'history';
        $subpages = 'logKelas';
        $logKelas = DB::table('table_log_Kelas')
        ->latest()
        ->get();
        return  view('admin.logkelas', compact('pages', 'subpages', 'logKelas'));
    }

    public function mapel() {
        $pages = 'history';
        $subpages = 'logMapel';
        $logMapel = DB::table('table_log_Mapels')
        ->latest()
        ->get();
        return  view('admin.logmapel', compact('pages', 'subpages', 'logMapel'));
    }
    
    public function ekskul() {
        $pages = 'history';
        $subpages = 'logEkskul';
        $logEkskul = DB::table('table_log_ekstrakurikulers')
        ->latest()
        ->get();
        return view('admin.logeskul', compact('pages', 'subpages', 'logEkskul'));
    }

    public function roster() {
        $pages = 'history';
        $subpages = 'logRoster';
        $logRoster = DB::table('table_log_rosters')
        ->latest()
        ->get();
        return view('admin.logroster', compact('pages', 'subpages', 'logRoster'));
    }

    public function profiles() {
        $pages = 'history';
        $subpages = 'logProfiles';
        $logProfiles = DB::table('table_log_profiles')
        ->latest()
        ->get();
        return view('admin.logprofiles', compact('pages', 'subpages', 'logProfiles'));
    }

    public function nilai() {
        $pages = 'history';
        $subpages = 'logNilai';
        $logNilai = DB::table('table_log_nilais')
        ->latest()
        ->get();
        return view('admin.lognilai', compact('pages', 'subpages', 'logNilai'));
    }

    public function prestasi() {
        $pages = 'history';
        $subpages = 'logPrestasi';
        $logPrestasi = DB::table('table_log_prestasis')
        ->latest()
        ->get();
        return view('admin.logprestasi', compact('pages', 'subpages', 'logPrestasi'));
    }

    public function ekskulSiswa() {
        $pages = 'history';
        $subpages = 'logEkskulSiswa';
        $logEkskulSiswa = DB::table('table_log_ekstrakurikuler_siswas')
        ->latest()
        ->get();
        return view('admin.logekskulsiswa', compact('pages', 'subpages', 'logEkskulSiswa'));
    }

    public function kontrak() {
        $pages = 'history';
        $subpages = 'logKontrak';
        $logKontrak = DB::table('table_log_kontraks')
        ->latest()
        ->get();
        return view('admin.logkontrak', compact('pages', 'subpages', 'logKontrak'));
    }

}
