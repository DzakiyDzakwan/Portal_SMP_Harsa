<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Siswa;
use App\Models\User;

class SiswaWaliKelas extends Component
{
    public $siswa, $kelas;

    public function render()
    {
        $this->siswa = Siswa::where('kelas', $this->kelas)->get();
        /* dd($this->siswa); */
        return view('guru.components.livewire.siswa-wali-kelas');
    }
    
}
