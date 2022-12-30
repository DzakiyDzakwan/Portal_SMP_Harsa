<?php

namespace App\Http\Livewire;

use App\Models\Ekstrakurikuler;
use App\Models\Siswa;
use Livewire\Component;

class InfoCardEkskulSiswa extends Component
{
    public $totalEkskul, $totalSiswa;

    protected $listeners = [
        'storeEkskul'=> 'render',
        'deleteEkskul' => 'render',
        'siswaStore'=> 'render',
        'siswaNonaktif' => 'render',
        'siswaUpdate' => 'render',
        'siswaDelete' => 'render'
    ];

    public function render()
    {
        $this->totalEkskul = Ekstrakurikuler::count();
        $this->totalSiswa = Siswa::count();
        return view('livewire.info-card-ekskul-siswa');
    }
}
