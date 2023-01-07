<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\RosterKelas;
use App\Models\LogActivity;

class CreateModalRoster extends Component
{
    public $kelass, $mapels, $mapel, $kelas, $waktu_mulai, $waktu_akhir, $hari, $tahun_ajaran, $semester, $tahun_ajaran_aktif, $semester_aktif;

    protected $listeners = [
        'filter'
    ];

    protected $rules = [
        'mapel' => 'required',
        'kelas' => 'required',
        'waktu_mulai' => 'required',
        'waktu_akhir' => 'required',
        'hari' => 'required',
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

    public function updated($fields) {
        $this->validateOnly($fields);
    }

    public function render()
    {
        $this->mapels = DB::table('mapel_gurus')->join('gurus', 'gurus.NUPTK', '=', 'mapel_gurus.guru')->join('user_profiles', 'user_profiles.user', '=', 'gurus.user')->join('mapels', 'mapel_gurus.mapel', '=', 'mapels.mapel_id')->get();
        $this->kelass = DB::table('list_kelas_aktif')->where('tahun_ajaran_aktif', $this->tahun_ajaran_aktif)->get();
        $data = DB::table('list_tahun_ajaran')->whereRaw('status = "aktif" COLLATE utf8mb4_general_ci')->first();
        // $tahunAktif = $data->tahun_ajaran;
        // $semesterAktif = $data->semester;
        return view('livewire.sekolah.manajemen-kelas.roster.create-modal-roster', compact('data'));
    }

    public function store()
    {
        $this->validate([
            'mapel' => 'required',
            'kelas' => 'required',
            'waktu_mulai' => 'required',
            'waktu_akhir' => 'required',
            'hari' => 'required',
        ]);

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
}
