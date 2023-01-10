<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ButtonExportRapor extends Component
{
    public $grade, $kontrak, $jenis;
    protected $listeners = [
        'search',
        'kontrakChange',
        'jenisChange'
    ];

    public function render()
    {
        $nilai = DB::table('rapor_ulangan_harian')
        ->where('kontrak_siswa', $this->kontrak)
        ->where('jenis', $this->jenis)
        ->where('siswa', Auth::user()->siswas->NISN)
        ->count();
        //$kelompokB = DB::table('rapor_nilai_pengetahuan')->where('kontrak_siswa', $this->kontrak)->where('jenis', $this->jenis)->where('kelompok_mapel', "B")->get();
        $mapel = DB::table('mapels')->count();
        return view('livewire.button-export-rapor', compact('mapel', 'nilai'));
    }

    public function search($semester, $jenis) {
    }

    public function kontrakChange($kontrak) {
        $this->kontrak = $kontrak;
    }

    public function jenisChange($jenis) {
        $this->jenis = $jenis;
    }

    public function export()
    {
        //dd($this->jenis, $this->kontrak);
        return redirect('/rapor/'.$this->kontrak.'/'.$this->jenis.'/cetak/');
    }
}
