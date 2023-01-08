<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ButtonExportRoster extends Component
{
    public $roster, $tahun_ajaran_aktif, $semester_aktif, $kelas;

    protected $listeners = [
        'filter'
    ];

    public function mount() {
        $data = DB::table('list_tahun_ajaran')->whereRaw('status <> "inaktif" COLLATE utf8mb4_general_ci')->first();
        $data1 = DB::table('list_kelas_aktif')->first();
        if($data && $data1 != null) {
            $this->tahun_ajaran_aktif = $data->tahun_ajaran;
            $this->semester_aktif = $data->semester;
            $this->kelas = $data1->kelas_aktif_id;
        }
    }

    public function filter($data, $data1) {
        $this->tahun_ajaran_aktif = $data["tahun_ajaran_aktif"];
        $this->semester_aktif = $data["semester_aktif"];
        $this->kelas = $data1["kelas_aktif_id"];
    }

    public function render()
    {
        return view('livewire.button-export-roster');
    }

    public function export()
    {
        return redirect('/guru/roster/'.$this->tahun_ajaran_aktif.'/'.$this->semester_aktif.'/'.$this->kelas.'/cetak/');
    }
}
