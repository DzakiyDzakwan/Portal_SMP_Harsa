<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SesiPenilaian;
use Illuminate\Support\Facades\DB;

class InfoCardNilai extends Component
{

    protected $listeners = [
        'storeSesi'=>'render'
    ];

    public function render()
    {
        $sesi = DB::table("list_sesi_penilaian")->where('status', "Aktif")->first();
        /* dd(is_null($sesi)); */
        return view('livewire.info-card-nilai', compact('sesi'));
    }
}
