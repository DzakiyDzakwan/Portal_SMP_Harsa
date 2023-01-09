<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Auth;

class ListTablePengetahuan extends Component
{

    public $grade, $kontrak, $jenis;
    protected $listeners = [
        'search',
        'kontrakChange',
        'jenisChange'
    ];

    public function render()
    {
        if ($this->jenis == "uts") {
            $kelompokA = DB::table('rapor_tengah_semester')->select('NISN', 'nama', 'kelompok_mapel', 'nama_mapel', 'kkm_aktif', 'nilai_pengetahuan', 'indeks_pengetahuan', 'deskripsi_pengetahuan')->where('kontrak_siswa', $this->kontrak)->where('kelompok_mapel', "A")->where('NISN', Auth::user()->siswas->NISN)->get();
            $kelompokB = DB::table('rapor_tengah_semester')->select('NISN', 'nama', 'kelompok_mapel', 'nama_mapel', 'kkm_aktif', 'nilai_pengetahuan', 'indeks_pengetahuan', 'deskripsi_pengetahuan')->where('kontrak_siswa', $this->kontrak)->where('kelompok_mapel', "B")->where('NISN', Auth::user()->siswas->NISN)->get();
        } elseif ($this->jenis == "uas") {
            $kelompokA = DB::table('rapor_pengetahuan_akhir_semester')->where('kontrak_siswa', $this->kontrak)->where('kelompok_mapel', "A")->get();
            $kelompokB = DB::table('rapor_pengetahuan_akhir_semester')->where('kontrak_siswa', $this->kontrak)->where('kelompok_mapel', "B")->get();
        } else {
            $kelompokA = DB::table('rapor_ulangan_harian')->select('kelompok_mapel', 'nama_mapel', 'kkm_aktif', 'nilai_pengetahuan', 'indeks_pengetahuan', 'deskripsi_pengetahuan')->where('kontrak_siswa', $this->kontrak)->where('jenis', $this->jenis)->where('kelompok_mapel', "A")->where('siswa', Auth::user()->siswas->NISN)->get();
            $kelompokB = DB::table('rapor_ulangan_harian')->select('kelompok_mapel', 'nama_mapel', 'kkm_aktif', 'nilai_pengetahuan', 'indeks_pengetahuan', 'deskripsi_pengetahuan')->where('kontrak_siswa', $this->kontrak)->where('jenis', $this->jenis)->where('kelompok_mapel', "B")->where('siswa', Auth::user()->siswas->NISN)->get();
        }
        return view('livewire.list-table-pengetahuan',compact('kelompokA', 'kelompokB'));
    }

    public function search($semester, $jenis) {
    }

    public function kontrakChange($kontrak) {
        $this->kontrak = $kontrak;
    }

    public function jenisChange($jenis) {
        $this->jenis = $jenis;
    }
}
