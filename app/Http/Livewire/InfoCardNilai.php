<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SesiPenilaian;
use Illuminate\Support\Facades\DB;

class InfoCardNilai extends Component
{

    protected $listeners = [
        'storeSesi' => 'render'
    ];

    public function render()
    {
        $sesi = DB::table("list_sesi_penilaian")->whereRaw('status = "aktif" COLLATE utf8mb4_general_ci')->first();
        /* dd(is_null($sesi)); */
        return view('livewire.sekolah.manajemen-nilai.info-card-nilai', compact('sesi'));
    }
}
