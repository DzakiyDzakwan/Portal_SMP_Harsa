<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\RosterKelas;
use App\Models\LogActivity;

class ListRoster extends Component
{
    public $roster;

    protected $listeners = [
        'rosterStore' => 'render',
        'rosterUpdate' => 'render',
        'rosterDelete' => 'render',
    ];

    public function editRoster($id) {
        $this->emit('editRoster', $id);
    }

    public function delete($id) {
        DB::select('CALL delete_roster(?, ?)', [$id, auth()->user()->uuid]);

        $this->render();
        $this->emit('rosterDelete');
        $this->dispatchBrowserEvent('inactive-alert');
    }

    public function render()
    {
        $this->roster = DB::table('list_roster')->get();
        return view('livewire.sekolah.manajemen-kelas.roster.list-roster');
    }
}
