<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Roster;
use App\Models\LogActivity;
use Illuminate\Support\Facades\DB;

class EditModalRoster extends Component
{
    public $roster, $waktu_mulai, $waktu_akhir, $hari, $roster_id;

    protected $listeners = [
        'editRoster' => 'showModal'
    ];

    protected $rules = [
        'waktu_mulai' => 'required',
        'waktu_akhir' => 'required',
        'hari' => 'required'
    ];

    public function updated($fields) {
        $this->validateOnly($fields);
    }

    public function render()
    {
        //$this->roster = DB::table('table_roster_kelas')->get();
        return view('livewire.sekolah.manajemen-kelas.roster.edit-modal-roster');
    }

    public function showModal($id) {
        $data = Roster::where('roster_id', $id)->first();
        $this->roster_id = $id;
        $this->waktu_mulai = $data->waktu_mulai;
        $this->waktu_akhir = $data->waktu_akhir;
        $this->hari = $data->hari;
        $this->dispatchBrowserEvent('edit-modal');
    }

    public function update()
    {
        DB::select('CALL update_roster(?, ?, ?, ?, ?)', [$this->roster_id, $this->waktu_mulai, $this->waktu_akhir, $this->hari, auth()->user()->uuid]);

        $this->emit('rosterUpdate');
        $this->dispatchBrowserEvent('update-alert');
        $this->dispatchBrowserEvent('edit-modal');
        $this->render();
    }
}
