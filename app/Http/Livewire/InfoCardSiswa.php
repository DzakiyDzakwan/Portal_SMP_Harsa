<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Siswa;

class InfoCardSiswa extends Component
{
    public $totalSiswa, $siswaActive, $siswaLulus, $siswaPindah, $siswaDO;

    protected $listeners = [
        'siswaStore'=> 'render',
        'siswaNonaktif' => 'render',
        'siswaUpdate' => 'render'
    ];

    public function render()
    {
        $this->totalSiswa = Siswa::count();
        $this->siswaActive = Siswa::where('status', 'Aktif')->count();
        $this->siswaLulus = Siswa::where('status', 'Lulus')->count();
        $this->siswaPindah = Siswa::where('status', 'Pindah')->count();
        $this->siswaDO = Siswa::where('status', 'Drop Out')->count();

        return view('admin.components.livewire.info-card-siswa');
    }
}
