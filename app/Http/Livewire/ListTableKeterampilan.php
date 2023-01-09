<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use App\Models\Nilai;

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
            $kelompokA = DB::table('rapor_keterampilan_tengah_semester')->where('kontrak_siswa', $this->kontrak)->where('kelompok_mapel', "A")->get();
            $kelompokB = DB::table('rapor_keterampilan_tengah_semester')->where('kontrak_siswa', $this->kontrak)->where('kelompok_mapel', "B")->get();
        } elseif ($this->jenis == "uas") {
            $kelompokA = DB::table('rapor_keterampilan_akhir_semester')->where('kontrak_siswa', $this->kontrak)->where('kelompok_mapel', "A")->get();
            $kelompokB = DB::table('rapor_keterampilan_akhir_semester')->where('kontrak_siswa', $this->kontrak)->where('kelompok_mapel', "B")->get();
        } else {
            $kelompokA = DB::table('rapor_nilai_keterampilan')->where('kontrak_siswa', $this->kontrak)->where('jenis', $this->jenis)->where('kelompok_mapel', "A")->get();
            $kelompokB = DB::table('rapor_nilai_keterampilan')->where('kontrak_siswa', $this->kontrak)->where('jenis', $this->jenis)->where('kelompok_mapel', "B")->get();
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
