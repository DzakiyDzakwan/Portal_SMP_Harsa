<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\RosterKelas;
use App\Models\LogActivity;

class ListRoster extends Component
{
    public $roster, $tahun_ajaran_aktif, $semester_aktif;

    protected $listeners = [
        'rosterStore' => 'render',
        'rosterUpdate' => 'render',
        'rosterDelete' => 'render',
        'filter'
    ];

    public function mount() {
        $data = DB::table('list_tahun_ajaran')->whereRaw('status <> "inaktif" COLLATE utf8mb4_general_ci')->first();
        if($data != null) {
            $this->tahun_ajaran_aktif = $data->tahun_ajaran;
            $this->semester_aktif = $data->semester;
        }
    }

    public function filter($data) {
        $this->tahun_ajaran_aktif = $data["tahun_ajaran_aktif"];
        $this->semester_aktif = $data["semester_aktif"];
    }

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
        $this->roster = DB::table('list_roster')->where('list_roster.tahun_ajaran_aktif', $this->tahun_ajaran_aktif)->where('list_roster.semester_aktif', $this->semester_aktif)->get();
        return view('livewire.sekolah.manajemen-kelas.roster.list-roster');
    }
}
