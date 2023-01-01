<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\TahunAjaran;

class FilterCardTahun extends Component
{
    public $tahun_ajaran_aktif, $semester_aktif;

    public function mount() {
        $data = DB::table('list_tahun_ajaran')->whereRaw('status <> "inaktif" COLLATE utf8mb4_general_ci')->first();
        if($data != null) {
            $this->tahun_ajaran_aktif = $data->tahun_ajaran;
            $this->semester_aktif = $data->semester;
        }
    }

    public function updated() {
        $data = [
            'tahun_ajaran_aktif' => $this->tahun_ajaran_aktif,
            'semester_aktif' => $this->semester_aktif
        ];
        $this->emit('filter', $data);
    }

    public function render()
    {
        $tahunAjaran = TahunAjaran::groupBy('tahun_ajaran')->get();
        return view('livewire.filter-card-tahun', compact('tahunAjaran'));
    }
}
