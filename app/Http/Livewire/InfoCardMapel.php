<?php

namespace App\Http\Livewire;

use App\Models\Mapel;
use Livewire\Component;
use App\Models\MapelGuru;

class InfoCardMapel extends Component
{
    public $totalMapel, $siswaMapelGuru;

    protected $listeners = [
        'mapelStore' => 'render',
        'restoreMapel' => 'render',
        'inactiveMapel' => 'render'
    ];

    public function render()
    {
        $this->totalMapel = Mapel::count();
        $this->totalMapelGuru = MapelGuru::count();
        return view('livewire.sekolah.manajemen-mata-pelajaran.mata-pelajaran.info-card-mapel');
    }
}
