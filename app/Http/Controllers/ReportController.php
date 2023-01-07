<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Ekstrakurikuler;
use PDF;

class ReportController extends Controller
{
    public function exportSiswa($ta, $sem)
    {
        $siswa = User::withTrashed()->join('siswas', 'siswas.user', '=', 'users.uuid')
        ->join('user_profiles', 'users.uuid', '=', 'user_profiles.user')
        ->join('kontrak_semesters', 'kontrak_semesters.siswa', '=', 'siswas.NISN')
        ->join('kelas_aktifs', 'kelas_aktifs.kelas_aktif_id', '=', 'kontrak_semesters.kelas')->where('kontrak_semesters.tahun_ajaran_aktif', $ta)->where('kontrak_semesters.semester_aktif', $sem)
        ->orderBy('siswas.created_at', 'DESC')
        ->get();

        $pdf = PDF::loadView('livewire.user.manajemen-akun.siswa.report-siswa', array('siswa' => $siswa, 'ta' => $ta))
        ->setPaper('a3', 'landscape');
        return $pdf->stream();
    }

    public function exportEkskul()
    {
        $ekskul = Ekstrakurikuler::all();
        //$kepsek = DB::table('users')->join('model_has_roles', 'model_has_roles.model_id' ,'=', 'users.uuid')->join('roles', 'roles.id', '=', 'model_has_roles.role_id')->where('role_id', '=', '1')->first();

        $pdf = PDF::loadView('livewire.report-ekskul', array('ekskul' => $ekskul))
        ->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    public function exportGuru()
    {
        $guru = User::withTrashed()->join('user_profiles', 'user_profiles.user', '=', 'users.uuid')->join('gurus', 'gurus.user', '=', 'user_profiles.user')->whereIn('jabatan', ['guru', 'wks', 'ks'])->get();

        $pdf = PDF::loadView('livewire.user.manajemen-akun.guru.report-guru', array('guru' => $guru))
        ->setPaper('a3', 'landscape');
        return $pdf->stream();
    }

    public function exportWaliKelas($ta)
    {
        $waliKelas = DB::table('list_kelas_aktif')->where('tahun_ajaran_aktif', $ta)->get();

        $pdf = PDF::loadView('livewire.sekolah.manajemen-kelas.kelas-aktif.report-wali-kelas', array('waliKelas' => $waliKelas, 'ta' => $ta))
        ->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    public function exportRoster()
    {
        $siswa = User::withTrashed()->join('siswas', 'siswas.user', '=', 'users.uuid')
        ->join('user_profiles', 'users.uuid', '=', 'user_profiles.user')
        ->join('kontrak_semesters', 'kontrak_semesters.siswa', '=', 'siswas.NISN')
        ->join('kelas_aktifs', 'kelas_aktifs.kelas_aktif_id', '=', 'kontrak_semesters.kelas')->where('kontrak_semesters.tahun_ajaran_aktif', '2022/2023')->where('kontrak_semesters.semester_aktif', 'ganjil')
        ->orderBy('siswas.created_at', 'DESC')
        ->get();

        $pdf = PDF::loadView('livewire.sekolah.manajemen-kelas.roster.report-roster', array('siswa' => $siswa))
        ->setPaper('a3', 'landscape');
        return $pdf->stream();
    }
}
