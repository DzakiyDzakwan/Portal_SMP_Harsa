<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

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
        $kelompokA = DB::table('rapor_nilai_pengetahuan')->where('kontrak_siswa', $this->kontrak)->where('jenis', $this->jenis)->where('kelompok_mapel', "A")->get();
        $kelompokB = DB::table('rapor_nilai_pengetahuan')->where('kontrak_siswa', $this->kontrak)->where('jenis', $this->jenis)->where('kelompok_mapel', "B")->get();
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
