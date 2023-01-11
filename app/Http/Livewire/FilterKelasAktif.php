<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\TahunAjaran;

class FilterKelasAktif extends Component
{

    public $tahun_ajaran_aktif;

    public function mount()
    {
        $data = DB::table('list_tahun_ajaran')->whereRaw('status <> "inaktif" COLLATE utf8mb4_general_ci')->first();
        if ($data != null) {
            $this->tahun_ajaran_aktif = $data->tahun_ajaran;
        }
    }

    public function updated()
    {
        $tahun_ajaran = $this->tahun_ajaran_aktif;
        $this->emit('filter', $tahun_ajaran);
    }

    public function render()
    {
        $tahunAjaran = DB::table('list_tahun_ajaran')->whereRaw('status <> "inaktif" COLLATE utf8mb4_general_ci')->groupBy('tahun_ajaran')->get();
        return view('livewire.filter-kelas-aktif', compact('tahunAjaran'));
    }
}
