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
        // $this->roster = DB::table('table_roster_kelas')->get();
        /* $this->roster = DB::table('roster_kelas')
        ->join('kelas', 'kelas.kelas_id', '=', 'roster_kelas.kelas')
        ->join('mapel_gurus', 'mapel_gurus.mapel_guru_id', '=', 'roster_kelas.mapel')
        ->join('mapels', 'mapels.mapel_id', '=', 'mapel_gurus.mapel')
        ->join('gurus', 'gurus.NIP', '=', 'mapel_gurus.guru')
        ->join('users', 'users.uuid', '=', 'gurus.user')
        ->join('user_profiles', 'user_profiles.user', '=', 'users.uuid')
        ->get(); */
        $this->roster = DB::table('list_roster_kelas')->get();
        return view('livewire.list-roster');
    }
}
