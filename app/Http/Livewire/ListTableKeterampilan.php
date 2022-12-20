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
        $kelompokA = DB::table('rapot_nilai_keterampilan')->where('kontrak_siswa', $this->kontrak)->where('jenis', $this->jenis)->where('kelompok_mapel', "A")->get();
        $kelompokB = DB::table('rapot_nilai_keterampilan')->where('kontrak_siswa', $this->kontrak)->where('jenis', $this->jenis)->where('kelompok_mapel', "B")->get();
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
