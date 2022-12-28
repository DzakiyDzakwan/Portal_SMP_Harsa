<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateTahunAkademik extends Component
{
    public $tahun_akademik, $semester, $start, $end;

    public function render()
    {
        return view('livewire.sekolah.tahun-akademik.create-tahun-akademik');
    }

    public function store() {
        dd($this);
    }
}
