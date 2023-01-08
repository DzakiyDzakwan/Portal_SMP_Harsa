<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TahunAjaran;
use Illuminate\Support\Facades\DB;

class FilterCardRoster extends Component
{
    public $tahun_ajaran_aktif, $semester_aktif, $kelas;

    public function mount() {
        $data = DB::table('list_tahun_ajaran')->whereRaw('status <> "inaktif" COLLATE utf8mb4_general_ci')->first();
        $data1 = DB::table('list_kelas_aktif')->first();
        if($data && $data1 != null) {
            $this->tahun_ajaran_aktif = $data->tahun_ajaran;
            $this->semester_aktif = $data->semester;
            $this->kelas = $data1->kelas_aktif_id;
        }
    }

    public function updated() {
        $data = [
            'tahun_ajaran_aktif' => $this->tahun_ajaran_aktif,
            'semester_aktif' => $this->semester_aktif,
        ];
        $data1 = [
            'kelas_aktif_id' => $this->kelas,
        ];
        $this->emit('filter', $data, $data1);
    }

    public function render()
    {
        $tahunAjaran = TahunAjaran::groupBy('tahun_ajaran')->get();
        $this->kelas = DB::table('list_kelas_aktif')->where('tahun_ajaran_aktif', $this->tahun_ajaran_aktif)->get();
        return view('livewire.filter-card-roster', compact('tahunAjaran'));
    }
}
