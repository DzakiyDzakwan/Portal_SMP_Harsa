<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class InfoCardTahunAkademik extends Component
{

    protected $listeners = [
        'createTahun' => 'render'
    ];

    public function render()
    {
        $tahunAktif = null;
        $semesterAktif = null;
        $data = DB::table('list_tahun_ajaran')->whereRaw('status = "aktif" COLLATE utf8mb4_general_ci')->first();
        if($data != null) {
            $tahunAktif = $data->tahun_ajaran;
            $semesterAktif = $data->semester;
        }
        return view('livewire.sekolah.tahun-akademik.info-card-tahun-akademik', compact('tahunAktif', 'semesterAktif'));
    }
}
