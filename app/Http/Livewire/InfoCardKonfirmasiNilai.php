<?php

namespace App\Http\Livewire;

use App\Models\Nilai;
use Livewire\Component;

class InfoCardKonfirmasiNilai extends Component
{
    public $totalNilaiPending;

    public function render()
    {
        $this->totalNilaiPending = Nilai::where('status', 'pending')->count();
        return view('livewire.info-card-konfirmasi-nilai');
    }
}
