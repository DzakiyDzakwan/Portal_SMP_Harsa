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
        'guruRestore' => 'render',
        'deleteGuru' => 'render'
    ];

    public function render()
    {
        $this->totalGuru = Guru::where('jabatan', 'guru')->count();
        $this->guruActive = Guru::where('status', 'aktif')->where('jabatan', 'guru')->count();
        $this->guruInactive = Guru::where('status', 'inaktif')->where('jabatan', 'guru')->count();
        return view('livewire.user.manajemen-akun.guru.info-card-guru');
    }
}
