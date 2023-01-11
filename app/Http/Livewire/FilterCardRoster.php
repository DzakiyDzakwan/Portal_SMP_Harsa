<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TahunAjaran;
use Illuminate\Support\Facades\DB;

class FilterCardRoster extends Component
{
    public $tahun_ajaran_aktif, $semester_aktif, $kelas, $kelas_aktif;

    public function mount() {
        $data_tahun_ajaran = DB::table('list_tahun_ajaran')->whereRaw('status <> "inaktif" COLLATE utf8mb4_general_ci')->first();
        if($data_tahun_ajaran !== null) {
            $this->tahun_ajaran_aktif = $data_tahun_ajaran->tahun_ajaran;
            $this->semester_aktif = $data_tahun_ajaran->semester;
        }
        $data_kelas = DB::table('list_kelas_aktif')->where('tahun_ajaran_aktif', $this->tahun_ajaran_aktif)->first();
        if($data_kelas !== null) {
            $this_kelas_aktif = $data_kelas->kelas_aktif_id;
        }
    }

    public function updated() {

        $this->kelas = DB::table('list_kelas_aktif')->where('tahun_ajaran_aktif', $this->tahun_ajaran_aktif)->get();
        $data = [
            'tahun_ajaran_aktif' => $this->tahun_ajaran_aktif,
            'semester_aktif' => $this->semester_aktif,
            'kelas_aktif_id' => $this->kelas_aktif,
        ];
        $this->emit('filter', $data);
    }

    public function render()
    {
        $tahunAjaran = DB::table('list_tahun_ajaran')->whereRaw('status <> "inaktif" COLLATE utf8mb4_general_ci')->groupBy('tahun_ajaran')->get();
        $this->kelas = DB::table('list_kelas_aktif')->where('tahun_ajaran_aktif', $this->tahun_ajaran_aktif)->get();
        return view('livewire.filter-card-roster', compact('tahunAjaran'));
    }
}
