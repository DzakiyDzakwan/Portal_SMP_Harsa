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
        RosterKelas::create([
            'mapel' => $this->mapel,
            'kelas' => $this->kelas,
            'waktu_mulai' => $this->waktu_mulai,
            'durasi' => $this->durasi,
            'hari' => $this->hari
        ]);

        LogActivity::create([
            'actor' => auth()->user()->uuid,
            'action' => 'insert',
            'at' => 'roster_kelas'
        ]);

        $this->reset();
        $this->emit('rosterStore');
        $this->dispatchBrowserEvent('insert-alert');
        $this->dispatchBrowserEvent('close-create-modal');
    }

    public function render()
    {
        $this->mapels = DB::table('mapel_gurus')->join('gurus', 'gurus.NIP', '=', 'mapel_gurus.guru')->join('user_profiles', 'user_profiles.user', '=', 'gurus.user')->get();
        $this->kelass = DB::table('kelas')->get();
        return view('livewire.create-modal-roster');
    }
}
