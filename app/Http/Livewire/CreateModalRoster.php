<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\RosterKelas;
use App\Models\LogActivity;

class CreateModalRoster extends Component
{
    public $kelass, $mapels, $mapel, $kelas, $waktu_mulai, $waktu_akhir, $hari;

    public function store()
    {
        $data = DB::table('list_tahun_ajaran')->whereRaw('status = "aktif" COLLATE utf8mb4_general_ci')->first();
        $tahun_ajaran = $data->tahun_ajaran;
        $semester = $data->semester;

        // $this->waktu_mulai = date("Y-m-d H:m:s", strtotime($this->waktu_mulai));
        // $this->waktu_akhir = date("Y-m-d H:m:s", strtotime($this->waktu_akhir));
        
        DB::select('CALL add_roster(?, ?, ?, ?, ?, ?, ?, ?)', [$this->mapel, $this->kelas, $tahun_ajaran, $semester, $this->waktu_mulai, $this->waktu_akhir, $this->hari, auth()->user()->uuid]);
        
        $this->reset();
        $this->emit('rosterStore');
        $this->dispatchBrowserEvent('insert-alert');
        $this->dispatchBrowserEvent('close-create-modal');
    }

    public function render()
    {
        $this->mapels = DB::table('mapel_gurus')->join('gurus', 'gurus.NUPTK', '=', 'mapel_gurus.guru')->join('user_profiles', 'user_profiles.user', '=', 'gurus.user')->join('mapels', 'mapel_gurus.mapel', '=', 'mapels.mapel_id')->get();
        $this->kelass = DB::table('kelas')->get();
        $data = DB::table('list_tahun_ajaran')->whereRaw('status = "aktif" COLLATE utf8mb4_general_ci')->first();
        $tahunAktif = $data->tahun_ajaran;
        $semesterAktif = $data->semester;
        return view('livewire.sekolah.manajemen-kelas.roster.create-modal-roster', compact('tahunAktif', 'semesterAktif'));
    }
}
