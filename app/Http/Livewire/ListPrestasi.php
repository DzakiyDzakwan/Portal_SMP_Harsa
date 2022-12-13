<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Prestasi;

class ListPrestasi extends Component
{

    public  $nisn, $prestasi;

    public function mount($nisn) {
        $this->nisn = $nisn;
    }

    public function render()
    {
        $this->prestasi = Prestasi::where('siswa', $this->nisn)->get();
        return view('livewire.list-prestasi');
    }
}
