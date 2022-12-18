<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class SesiPenilaianModal extends Component
{
    public $nama_sesi, $tahun_ajaran, $start, $end;

    public function render()
    {
        $sesi = DB::table('list_sesi_penilaian')->get();
        return view('livewire.sesi-penilaian-modal', compact("sesi"));
    }

    public function store() {
        $start = date("Y-m-d H:m:s", strtotime($this->start));
        $end = date("Y-m-d H:m:s", strtotime($this->end));
        DB::select('call add_sesi(?, ?, ?, ?, ?)', [$this->nama_sesi, $this->tahun_ajaran, $start, $end, auth()->user()->uuid]);
        $this->reset();
        $this->emit('storeSesi');
        $this->dispatchBrowserEvent('insert-alert');
        
    }
}
