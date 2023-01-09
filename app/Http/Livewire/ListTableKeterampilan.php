<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use App\Models\Nilai;
use Auth;

use Livewire\Component;

class ListTableKeterampilan extends Component
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
            $kelompokA = DB::table('rapor_tengah_semester')->select('NISN', 'nama', 'kelompok_mapel', 'nama_mapel', 'kkm_aktif', 'nilai_keterampilan', 'indeks_keterampilan', 'deskripsi_keterampilan')->where('kontrak_siswa', $this->kontrak)->where('kelompok_mapel', "A")->where('NISN', Auth::user()->siswas->NISN)->get();
            $kelompokB = DB::table('rapor_tengah_semester')->select('NISN', 'nama', 'kelompok_mapel', 'nama_mapel', 'kkm_aktif', 'nilai_keterampilan', 'indeks_keterampilan', 'deskripsi_keterampilan')->where('kontrak_siswa', $this->kontrak)->where('kelompok_mapel', "B")->where('NISN', Auth::user()->siswas->NISN)->get();
        } elseif ($this->jenis == "uas") {
            $kelompokA = DB::table('rapor_akhir_semester')->select('NISN', 'nama', 'kelompok_mapel', 'nama_mapel', 'kkm_aktif', 'nilai_keterampilan', 'indeks_keterampilan', 'deskripsi_keterampilan')->where('kontrak_siswa', $this->kontrak)->where('kelompok_mapel', "A")->where('NISN', Auth::user()->siswas->NISN)->get();
            $kelompokB = DB::table('rapor_akhir_semester')->select('NISN', 'nama', 'kelompok_mapel', 'nama_mapel', 'kkm_aktif', 'nilai_keterampilan', 'indeks_keterampilan', 'deskripsi_keterampilan')->where('kontrak_siswa', $this->kontrak)->where('kelompok_mapel', "B")->where('NISN', Auth::user()->siswas->NISN)->get();
        } else {
            $kelompokA = DB::table('rapor_ulangan_harian')->select('kelompok_mapel', 'nama_mapel', 'kkm_aktif', 'nilai_keterampilan', 'indeks_keterampilan', 'deskripsi_keterampilan')->where('kontrak_siswa', $this->kontrak)->where('jenis', $this->jenis)->where('kelompok_mapel', "A")->where('siswa', Auth::user()->siswas->NISN)->get();
            $kelompokB = DB::table('rapor_ulangan_harian')->select('kelompok_mapel', 'nama_mapel', 'kkm_aktif', 'nilai_keterampilan', 'indeks_keterampilan', 'deskripsi_keterampilan')->where('kontrak_siswa', $this->kontrak)->where('jenis', $this->jenis)->where('kelompok_mapel', "B")->where('siswa', Auth::user()->siswas->NISN)->get(); 
        }

        return view('livewire.list-table-keterampilan',compact('kelompokA', 'kelompokB'));
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
