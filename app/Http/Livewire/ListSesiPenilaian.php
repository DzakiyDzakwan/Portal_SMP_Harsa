<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ListSesiPenilaian extends Component
{
    public $sesi;

    protected $listeners = [
        'sesiStore' => 'render',
        'sesiUpdate' => 'render',
    ];

    public function editSesi($id)
    {
        $this->emit('editUser', $id);
    }

    public function render()
    {
        $this->sesi = DB::table('list_sesi_penilaian')->get();
        return view('livewire.sekolah.manajemen-nilai.list-sesi-penilaian');
    }
}
