<?php

namespace App\Http\Livewire;

use App\Models\Ekstrakurikuler;
use App\Models\LogActivity;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateModalEkskul extends Component
{
    public $ekstrakurikuler_id, $nama, $hari, $waktu_mulai, $durasi, $tempat, $kelas;
    public function store(){
        $this->validate([
            'ekstrakurikuler_id' => 'required|min:3|max:5|unique:ekstrakurikulers',
            'nama' => 'required|unique:ekstrakurikulers',
            'waktu_mulai' => 'required',
            'durasi' => 'required|integer|min:30',
            'tempat' => 'required'
        ]);

        DB::select('CALL add_ekstrakurikuler(?, ?, ?, ?, ?, ?, ?, ?)', [auth()->user()->uuid, $this->ekstrakurikuler_id, $this->nama, $this->hari, $this->waktu_mulai, $this->durasi, $this->tempat, $this->kelas]);
        // Ekstrakurikuler::create([
        //     'ekstrakurikuler_id' => $this->ekstrakurikuler_id,
        //     'nama' => $this->nama,
        //     'hari' => $this->hari,
        //     'waktu_mulai' => $this->waktu_mulai,
        //     'durasi' => $this->durasi,
        //     'tempat' => $this->tempat,
        //     'kelas' => $this->kelas
        // ]);

        // LogActivity::create([
        //     'actor' => auth()->user()->uuid,
        //     'action' => 'insert',
        //     'at' => 'ekstrakurikulers'
        // ]);

        $this->reset();
        $this->emit('storeEkskul');
        $this->dispatchBrowserEvent('insert-alert');
        $this->dispatchBrowserEvent('close-create-modal');
    }
    public function render()
    {
        return view('livewire.create-modal-ekskul');
    }
}
