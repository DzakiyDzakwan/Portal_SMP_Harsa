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

        RosterKelas::where('roster_id', $id)->delete();

        LogActivity::create([
            'actor' => auth()->user()->uuid,
            'action' => 'delete',
            'at' => 'roster_kelas'
        ]);

        $this->render();
        $this->emit('rosterDelete');
        $this->dispatchBrowserEvent('inactive-alert');
    }

    public function render()
    {
        // CREATE VIEW table_roster_kelas AS
        // SELECT roster_kelas.roster_id, mapels.nama_mapel, user_profiles.nama, kelas.nama_kelas, roster_kelas.waktu_mulai, roster_kelas.durasi, roster_kelas.hari FROM roster_kelas
        // JOIN kelas ON kelas.kelas_id = roster_kelas.kelas
        // JOIN mapel_gurus ON mapel_gurus.mapel_guru_id = roster_kelas.mapel
        // JOIN mapels ON mapels.mapel_id = mapel_gurus.mapel
        // JOIN gurus ON gurus.NIP = mapel_gurus.guru
        // JOIN users ON users.uuid = gurus.user
        // JOIN user_profiles ON user_profiles.user = users.uuid
        // GROUP BY roster_kelas.roster_id, mapels.nama_mapel, user_profiles.nama, kelas.nama_kelas, roster_kelas.waktu_mulai, roster_kelas.durasi, roster_kelas.hari
        // $this->roster = DB::table('table_roster_kelas')->get();
        $this->roster = DB::table('roster_kelas')
        ->join('kelas', 'kelas.kelas_id', '=', 'roster_kelas.kelas')
        ->join('mapel_gurus', 'mapel_gurus.mapel_guru_id', '=', 'roster_kelas.mapel')
        ->join('mapels', 'mapels.mapel_id', '=', 'mapel_gurus.mapel')
        ->join('gurus', 'gurus.NIP', '=', 'mapel_gurus.guru')
        ->join('users', 'users.uuid', '=', 'gurus.user')
        ->join('user_profiles', 'user_profiles.user', '=', 'users.uuid')
        ->get();
        return view('livewire.list-roster');
    }
}
