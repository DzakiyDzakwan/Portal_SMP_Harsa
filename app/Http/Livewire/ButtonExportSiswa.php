<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ButtonExportSiswa extends Component
{

    public $tahun_ajaran_aktif, $semester_aktif;

    protected $listeners = [
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

        //dd($this->tahun_ajaran_aktif, $this->semester_aktif);
    }

    public function render()
    {
        // dd($this->tahun_ajaran_aktif, $this->semester_aktif);
        return view('livewire.button-export-siswa');
    }

    public function export()
    {
        return redirect('/guru/siswa/'.$this->tahun_ajaran_aktif.'/'.$this->semester_aktif.'/cetak/');
    }
}
