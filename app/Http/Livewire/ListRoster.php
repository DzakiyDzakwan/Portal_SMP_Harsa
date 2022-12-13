<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ListRoster extends Component
{
    public $roster;

    public function render()
    {
        $this->roster = DB::table('table_roster_kelas')->get();
        // $this->mapel = $data->mapel;
        // $this->kelas = $data->kelas;
        // $this->waktu = $data->waktu_mulai;
        // $this->durasi = $data->durasi;
        // $this->hari = $data->hari;
        return view('livewire.list-roster');
    }
}
