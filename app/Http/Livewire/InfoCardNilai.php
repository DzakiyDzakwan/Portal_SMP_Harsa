<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SesiPenilaian;
use Illuminate\Support\Facades\DB;

class InfoCardNilai extends Component
{

    public $sesi;

    public function render()
    {
        $this->sesi = DB::table("list_sesi_penilaian")->where('sesi_id', $sesi_id);
        dd($this->sesi);
        return view('livewire.info-card-nilai');
    }
}
