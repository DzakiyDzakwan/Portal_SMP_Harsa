<?php

namespace App\Http\Livewire;

use App\Models\Ekstrakurikuler;
use App\Models\LogActivity;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EditModalEkskul extends Component
{
    public $data, $nama, $hari, $waktu_mulai, $durasi, $tempat, $kelas;

    protected $rules = [
        'nama' => 'required'
    ];

    protected $listeners = [
        'editEkskul' => 'showModal'
    ];

    public function updated($fields) {
        $this->validateOnly($fields);
    }

    public function render()
    {
        return view('livewire.edit-modal-ekskul');
    }

    public function showModal($id) {
        $data = Ekstrakurikuler::where('Ekstrakurikuler_id', $id)->first();
        $this->ekstrakurikuler_id = $id;
        $this->nama = $data->nama;
        $this->hari = $data->hari;
        $this->waktu_mulai = $data->waktu_mulai;
        $this->durasi = $data->durasi;
        $this->tempat = $data->tempat;
        $this->kelas = $data->kelas;
        $this->dispatchBrowserEvent('edit-modal');
    }

    public function update() {
        $this->validate([
            'nama' => 'required',
            'waktu_mulai' => 'required',
            'durasi' => 'required|integer|min:30',
            'tempat' => 'required'
        ]);
        DB::select('CALL update_ekstrakurikuler(?, ?, ?, ?, ?, ?, ?, ?)', [auth()->user()->uuid, $this->ekstrakurikuler_id, $this->nama, $this->hari, $this->waktu_mulai, $this->durasi, $this->tempat, $this->kelas]);

        // Ekstrakurikuler::where('ekstrakurikuler_id', $this->ekstrakurikuler_id)->update([
        //     'nama' => $this->nama,
        //     'hari' => $this->hari,
        //     'waktu_mulai' => $this->waktu_mulai,
        //     'durasi' => $this->durasi,
        //     'tempat' => $this->tempat,
        //     'kelas' => $this->kelas
        // ]);

        // LogActivity::create([
        //     'actor' => auth()->user()->uuid,
        //     'action' => 'update',
        //     'at' => 'ekstrakurikulers'
        // ]);

        $this->emit('updateEkskul');
        $this->dispatchBrowserEvent('edit-modal');
        $this->dispatchBrowserEvent('update-alert');

        
    }
}
