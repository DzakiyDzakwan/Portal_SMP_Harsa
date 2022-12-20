<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\RosterKelas;
use App\Models\LogActivity;

class CreateModalRoster extends Component
{
    public $kelass, $mapels, $mapel, $kelas, $waktu_mulai, $durasi, $hari; 

    public function store()
    {
        $waktu_mulai = date("Y-m-d H:m:s", strtotime($this->waktu_mulai));
        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?)', [$this->mapel, $this->kelas, $this->waktu_mulai, $this->durasi, $this->hari, auth()->user()->uuid]);

        $this->reset();
        $this->emit('rosterStore');
        $this->dispatchBrowserEvent('insert-alert');
        $this->dispatchBrowserEvent('close-create-modal');
    }

    public function render()
    {
        $this->mapels = DB::table('mapel_gurus')->join('gurus', 'gurus.NIP', '=', 'mapel_gurus.guru')->join('user_profiles', 'user_profiles.user', '=', 'gurus.user')->join('mapels', 'mapel_gurus.mapel', '=', 'mapels.mapel_id')->get();
        $this->kelass = DB::table('kelas')->get();
        return view('livewire.create-modal-roster');
    }
}
