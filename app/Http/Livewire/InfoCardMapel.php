<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;


class InfoCardMapel extends Component
{
    public $totalMapel, $totalMapelGuru;

    protected $listeners = [
        'mapelStore' => 'render',
        'restoreMapel' => 'render',
        'inactiveMapel' => 'render'
    ];

    public function render()
    {
        $this->totalMapel = DB::table('mapels')->count();
        $this->totalMapelGuru = DB::table('mapel_gurus')->count();
        return view('livewire.sekolah.manajemen-mata-pelajaran.mata-pelajaran.info-card-mapel');
    }
}
