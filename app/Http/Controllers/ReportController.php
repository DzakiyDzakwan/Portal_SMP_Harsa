<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Ekstrakurikuler;
use App\Models\KontrakSemester;
use PDF;
use Auth;

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

    public function exportRoster($ta, $sem, $kls)
    {
        $roster = DB::table('list_roster')->where('tahun_ajaran_aktif', $ta)->where('semester_aktif', $sem)->where('kelas_aktif_id', $kls)->orderBy('hari')->get();
        $kelas = DB::table('list_kelas_aktif')->select('nama_kelas_aktif')->distinct()->where('kelas_aktif_id', $kls)->first();
        $row = DB::table('list_roster')->select('hari')->distinct()->where('tahun_ajaran_aktif', $ta)->where('semester_aktif', $sem)->where('kelas_aktif_id', $kls)->get();
        // dd($row);

        $pdf = PDF::loadView('livewire.sekolah.manajemen-kelas.roster.report-roster', array('roster' => $roster, 'ta' => $ta, 'kelas' => $kelas, 'row' => $row))
        ->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function exportRapor($kontrak, $jenis)
    {
        if ($jenis == "uts") {
            $pengetahuanA = DB::table('rapor_pengetahuan_tengah_semester')->where('kontrak_siswa', $kontrak)->where('kelompok_mapel', "A")->where('siswa', Auth::user()->siswas->NISN)->get();
            $pengetahuanB = DB::table('rapor_pengetahuan_tengah_semester')->where('kontrak_siswa', $kontrak)->where('kelompok_mapel', "B")->where('siswa', Auth::user()->siswas->NISN)->get();
            
            $keterampilanA = DB::table('rapor_keterampilan_tengah_semester')->where('kontrak_siswa', $kontrak)->where('kelompok_mapel', "A")->where('siswa', Auth::user()->siswas->NISN)->get();
            $keterampilanB = DB::table('rapor_keterampilan_tengah_semester')->where('kontrak_siswa', $kontrak)->where('kelompok_mapel', "B")->where('siswa', Auth::user()->siswas->NISN)->get();
        } elseif ($jenis == "uas") {
            $pengetahuanA = DB::table('rapor_pengetahuan_akhir_semester')->where('kontrak_siswa', $kontrak)->where('kelompok_mapel', "A")->where('siswa', Auth::user()->siswas->NISN)->get();
            $pengetahuanB = DB::table('rapor_pengetahuan_akhir_semester')->where('kontrak_siswa', $kontrak)->where('kelompok_mapel', "B")->where('siswa', Auth::user()->siswas->NISN)->get();
            
            $keterampilanA = DB::table('rapor_keterampilan_akhir_semester')->where('kontrak_siswa', $kontrak)->where('kelompok_mapel', "A")->where('siswa', Auth::user()->siswas->NISN)->get();
            $keterampilanB = DB::table('rapor_keterampilan_akhir_semester')->where('kontrak_siswa', $kontrak)->where('kelompok_mapel', "B")->where('siswa', Auth::user()->siswas->NISN)->get();
        } else {
            $pengetahuanA = DB::table('rapor_nilai_pengetahuan')->where('kontrak_siswa', $kontrak)->where('jenis', $jenis)->where('kelompok_mapel', "A")->where('siswa', Auth::user()->siswas->NISN)->get();
            $pengetahuanB = DB::table('rapor_nilai_pengetahuan')->where('kontrak_siswa', $kontrak)->where('jenis', $jenis)->where('kelompok_mapel', "B")->where('siswa', Auth::user()->siswas->NISN)->get();
            
            $keterampilanA = DB::table('rapor_nilai_keterampilan')->where('kontrak_siswa', $kontrak)->where('jenis', $jenis)->where('kelompok_mapel', "A")->where('siswa', Auth::user()->siswas->NISN)->get();
            $keterampilanB = DB::table('rapor_nilai_keterampilan')->where('kontrak_siswa', $kontrak)->where('jenis', $jenis)->where('kelompok_mapel', "B")->where('siswa', Auth::user()->siswas->NISN)->get(); 
        }
        $siswa = User::join('siswas', 'siswas.user', '=', 'users.uuid')->join('user_profiles', 'users.uuid', '=', 'user_profiles.user')->where('siswas.NISN', Auth::user()->siswas->NISN)->get();
        $kontrak = DB::table('kontrak_semesters')->join('kelas_aktifs', 'kelas_aktifs.kelas_aktif_id', '=', 'kontrak_semesters.kelas')->join('gurus', 'gurus.NUPTK', '=', 'kelas_aktifs.wali_kelas')->join('user_profiles', 'user_profiles.user', '=', 'gurus.user')->where('kontrak_semesters.siswa', Auth::user()->siswas->NISN)->get();
        
        $pdf = PDF::loadView('siswa.report-rapor', array('pengetahuanA' => $pengetahuanA, 'pengetahuanB' => $pengetahuanB, 'keterampilanA' => $keterampilanA, 'keterampilanB' => $keterampilanB, 'siswa' => $siswa, 'kontrak' => $kontrak))
        ->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
}
