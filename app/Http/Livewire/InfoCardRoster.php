<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Roster;
use Illuminate\Support\Facades\DB;

class InfoCardRoster extends Component
{
    public $totalRoster;

    protected $listeners = [
        'rosterStore'=> 'render',
        'rosterDelete'=> 'render',
    ];

    public function render()
    {
        $this->totalRoster = Roster::count();
        $data = DB::table('list_tahun_ajaran')->whereRaw('status = "aktif" COLLATE utf8mb4_general_ci')->first();
        $tahunAktif = $data->tahun_ajaran;
        $semesterAktif = $data->semester;
        return view('livewire.sekolah.manajemen-kelas.roster.info-card-roster', compact('tahunAktif', 'semesterAktif'));
    }
}
