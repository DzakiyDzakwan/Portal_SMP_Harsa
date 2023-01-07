<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ButtonExportWaliKelas extends Component
{
    public $tahun_ajaran_aktif;

    protected $listeners = [
        'filter'
    ];

    public function mount() {
        $data = DB::table('list_tahun_ajaran')->whereRaw('status <> "inaktif" COLLATE utf8mb4_general_ci')->first();
        if($data != null) {
            $this->tahun_ajaran_aktif = $data->tahun_ajaran;
        }
    }

    public function filter($data) {
        $this->tahun_ajaran_aktif = $data;
    }

    public function render()
    {
        // dd($this->tahun_ajaran_aktif, $this->semester_aktif);
        return view('livewire.button-export-wali-kelas');
    }

    public function export()
    {
        return redirect('/guru/kelas-aktif/'.$this->tahun_ajaran_aktif.'/cetak/');
    }
}
