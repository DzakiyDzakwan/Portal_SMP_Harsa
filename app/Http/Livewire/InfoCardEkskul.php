<?php

namespace App\Http\Livewire;

use App\Models\Ekstrakurikuler;
use Livewire\Component;

class InfoCardEkskul extends Component
{
    public $totalEkskul;

    protected $listeners = [
        'storeEkskul'=> 'render',
        'deleteEkskul' => 'render'
    ];

    public function render()
    {
        $this->totalEkskul = Ekstrakurikuler::count();
        return view('livewire.info-card-ekskul');
    }
}
