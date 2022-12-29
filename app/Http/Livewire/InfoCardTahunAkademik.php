<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class InfoCardTahunAkademik extends Component
{
    public function render()
    {
        $data = DB::table('list_tahun_ajaran')->whereRaw('status = "aktif" COLLATE utf8mb4_general_ci')->first();
        $tahunAktif = $data->tahun_ajaran;
        $semesterAktif = $data->semester;
        return view('livewire.sekolah.tahun-akademik.info-card-tahun-akademik', compact('tahunAktif', 'semesterAktif'));
    }
}
