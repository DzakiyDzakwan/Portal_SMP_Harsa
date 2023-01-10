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
        $submenu = 'log-aktifitas';
        $logActivities = DB::table('table_log_activities')
        ->latest()
        ->get();
        return view('audit.logactivity', compact('menu', 'logActivities', 'submenu'));
    }

    public function user() {
        $menu = 'history';
        $submenu = 'log-user';
        $logUser = DB::table('table_log_users')
        ->latest()
        ->get();
        return  view('audit.logusers',compact('menu', 'submenu', 'logUser'));
    }

    public function role() {
        $menu = 'history';
        $submenu = 'log-role';
        $logRole = DB::table('table_log_roles')
        ->latest()
        ->get();
        return  view('audit.logrole', compact('menu', 'submenu', 'logRole'));
    }

    public function permission() {
        $menu = 'history';
        $submenu = 'log-permission';
        $logPermission = DB::table('table_log_permissions')
        ->latest()
        ->get();
        return  view('audit.logpermission', compact('menu', 'submenu', 'logPermission'));
    }

    public function siswa() {
        $menu = 'history';
        $submenu = 'log-siswa';
        $logSiswa = DB::table('table_log_siswas')
        ->latest()
        ->get();
        return  view('audit.logsiswa', compact('menu', 'submenu', 'logSiswa'));
    }

    public function guru() {
        $menu = 'history';
        $submenu = 'log-guru';
        $logGuru = DB::table('table_log_gurus')
        ->latest()
        ->get();
        return  view('audit.logguru', compact('menu', 'submenu', 'logGuru'));
    }

    public function kelas() {
        $menu = 'history';
        $submenu = 'log-kelas';
        $logKelas = DB::table('table_log_Kelas')
        ->latest()
        ->get();
        return  view('audit.logkelas', compact('menu', 'submenu', 'logKelas'));
    }

    public function mapel() {
        $menu = 'history';
        $submenu = 'log-mapel';
        $logMapel = DB::table('table_log_Mapels')
        ->latest()
        ->get();
        return  view('audit.logmapel', compact('menu', 'submenu', 'logMapel'));
    }
    
    public function ekskul() {
        $menu = 'history';
        $submenu = 'log-ekstrakurikuler';
        $logEkskul = DB::table('table_log_ekstrakurikulers')
        ->latest()
        ->get();
        return view('audit.logeskul', compact('menu', 'submenu', 'logEkskul'));
    }

    public function roster() {
        $menu = 'history';
        $submenu = 'log-roster';
        $logRoster = DB::table('table_log_rosters')
        ->latest()
        ->get();
        return view('audit.logroster', compact('menu', 'submenu', 'logRoster'));
    }

    public function profiles() {
        $menu = 'history';
        $submenu = 'log-profil';
        $logProfiles = DB::table('table_log_profiles')
        ->latest()
        ->get();
        return view('audit.logprofiles', compact('menu', 'submenu', 'logProfiles'));
    }

    public function nilai() {
        $menu = 'history';
        $submenu = 'log-nilai';
        $logNilai = DB::table('table_log_nilais')
        ->latest()
        ->get();
        return view('audit.lognilai', compact('menu', 'submenu', 'logNilai'));
    }

    public function prestasi() {
        $menu = 'history';
        $submenu = 'log-prestasi';
        $logPrestasi = DB::table('table_log_prestasis')
        ->latest()
        ->get();
        return view('audit.logprestasi', compact('menu', 'submenu', 'logPrestasi'));
    }

    public function ekskulSiswa() {
        $menu = 'history';
        $submenu = 'log-ekstrakurikuler-siswa';
        $logEkskulSiswa = DB::table('table_log_ekstrakurikuler_siswas')
        ->latest()
        ->get();
        return view('audit.logekskulsiswa', compact('menu', 'submenu', 'logEkskulSiswa'));
    }

    public function kontrak() {
        $menu = 'history';
        $submenu = 'log-kontrak';
        $logKontrak = DB::table('table_log_kontraks')
        ->latest()
        ->get();
        return view('audit.logkontrak', compact('menu', 'submenu', 'logKontrak'));
    }

}
