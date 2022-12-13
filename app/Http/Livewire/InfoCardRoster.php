<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\RosterKelas;

class InfoCardRoster extends Component
{
    public $totalRoster;

    protected $listeners = [
        'rosterStore'=> 'render',
    ];

    public function render()
    {
        $this->totalRoster = RosterKelas::count();
        return view('livewire.info-card-roster');
    }
}
