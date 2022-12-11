<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kelas;

class InfoCardKelas extends Component
{

    public $totalKelas;

    protected $listeners = [
        'storeKelas' => 'render'
    ];

    public function render()
    {
        
        $this->totalKelas = Kelas::count();
        return view('admin.components.livewire.info-card-kelas');
    }
}
