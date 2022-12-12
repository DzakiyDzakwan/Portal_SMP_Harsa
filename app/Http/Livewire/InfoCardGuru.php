<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Guru;

class InfoCardGuru extends Component
{

    public $totalGuru, $guruActive, $guruInactive;

    protected $listeners = [
        'storeGuru' => 'render',
        'inactiveGuru' => 'render',
        'deleteGuru' => 'render'
    ];

    public function render()
    {
        $this->totalGuru = Guru::count();
        $this->guruActive = Guru::where('status', 'Aktif')->count();
        $this->guruInactive = Guru::where('status', 'Inaktif')->count();
        return view('admin.components.livewire.info-card-guru');
    }
}
