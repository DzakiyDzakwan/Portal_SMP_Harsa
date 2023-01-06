<?php

namespace App\Http\Livewire;

use App\Models\Ekstrakurikuler;
use App\Models\Guru;
use Livewire\Component;

class InfoCardPembinaEkskul extends Component
{
    public $totalEkskul, $totalGuru;

    protected $listeners = [
        'storeEkskul'=> 'render',
        'deleteEkskul' => 'render',
        'storeGuru' => 'render',
        'inactiveGuru' => 'render',
        'deleteGuru' => 'render'
    ];

    public function render()
    {
        $this->totalEkskul = Ekstrakurikuler::count();
        $this->totalGuru = Guru::where('jabatan', 'guru')->count();
        return view('livewire.info-card-pembina-ekskul');
    }
}
