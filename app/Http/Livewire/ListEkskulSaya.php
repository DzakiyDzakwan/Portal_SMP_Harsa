<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ListEkskulSaya extends Component
{
    public $tahun_ajaran_aktif;

    public function render()
    {
        $tahun_ajaran = DB::table('list_tahun_ajaran')->whereRaw('status <> "inaktif" COLLATE utf8mb4_general_ci')->first();
        if($tahun_ajaran != null) {
            $this->tahun_ajaran_aktif = $tahun_ajaran->tahun_ajaran;
        }
        $ekskul = DB::table('list_ekstrakurikuler_siswa')->where('NISN', auth()->user()->siswas->NISN)->where('tahun_ajaran', $this->tahun_ajaran_aktif)->get();
        return view('livewire.sekolah.manajemen-ekstrakurikuler.list-ekskul-saya', compact('ekskul'));
    }
}
