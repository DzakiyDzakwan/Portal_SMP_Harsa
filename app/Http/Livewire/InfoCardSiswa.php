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
        'siswaUpdate' => 'render',
        'siswaDelete' => 'render'
    ];

    public function render()
    {
        $this->totalSiswa = Siswa::count();
        $this->siswaActive = Siswa::where('status', 'aktif')->count();
        $this->siswaLulus = Siswa::where('status', 'lulus')->count();
        $this->siswaPindah = Siswa::where('status', 'pindah')->count();
        $this->siswaDO = Siswa::where('status', 'dropout')->count();

        return view('livewire.user.manajemen-akun.siswa.info-card-siswa');
    }
}
