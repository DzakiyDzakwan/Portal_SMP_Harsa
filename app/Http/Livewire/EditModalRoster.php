<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\RosterKelas;
use App\Models\LogActivity;
use Illuminate\Support\Facades\DB;

class EditModalRoster extends Component
{
    public $roster, $waktu_mulai, $durasi, $hari, $roster_id;

    protected $listeners = [
        'editRoster' => 'showModal'
    ];

    protected $rules = [
        'waktu_mulai' => 'required',
        'durasi' => 'required',
        'hari' => 'required'
    ];

    public function updated($fields) {
        $this->validateOnly($fields);
    }

    public function render()
    {
        //$this->roster = DB::table('table_roster_kelas')->get();
        return view('livewire.edit-modal-roster');
    }

    public function showModal($id) {
        $data = RosterKelas::where('roster_id', $id)->first();
        $this->roster_id = $id;
        $this->waktu_mulai = $data->waktu_mulai;
        $this->durasi = $data->durasi;
        $this->hari = $data->hari;
        $this->dispatchBrowserEvent('edit-modal');
    }

    public function update()
    {
        // $this->validate([
        //     'nama' => 'required',
        //     'nis' => 'required|max:4'
        // ]);

        RosterKelas::where('roster_id', $this->roster_id)->update([
            'waktu_mulai' => $this->waktu_mulai,
            'durasi' => $this->durasi,
            'hari' => $this->hari,
        ]);

        LogActivity::create([
            'actor' => auth()->user()->uuid,
            'action' => 'update',
            'at' => 'roster_kelas'
        ]);

        $this->emit('rosterUpdate');
        $this->dispatchBrowserEvent('update-alert');
        $this->dispatchBrowserEvent('edit-modal');
        $this->render();
    }
}
