<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\KontrakSemester;

class FilterCardRapot extends Component
{
    public $grade, $semester, $jenis;

    public function render()
    {
        $kontrak = KontrakSemester::where('grade', $this->grade)->where('siswa', Auth::user()->siswas->NISN)->get();
        return view('livewire.filter-card-rapot', compact('kontrak'));
    }

    public function updatedsemester($kontrak) {
        $this->emit('kontrakChange', $kontrak);
    }

    public function updatedjenis($jenis) {
        $this->emit('jenisChange',$jenis);
    }

    public function search() {
        $this->emit('search');
    }
}
