<?php

namespace App\Http\Livewire;

use App\Models\Guru;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ListKelasAktif extends Component
{
    public $kelasAktif;
    protected $listeners = [
        'storeKelasAktif' => 'render',
        'updateKelasAktif' => 'render',
        'filter'
    ];

    // public function mount() {
    //     $data = DB::table('list_tahun_ajaran')->whereRaw('status <> "inaktif" COLLATE utf8mb4_general_ci')->first();
    //     if($data != null) {
    //         $this->tahun_ajaran_aktif = $data->tahun_ajaran;
    //         $this->semester_aktif = $data->semester;
    //     }
    // }

    // public function filter($data) {
    //     $this->tahun_ajaran_aktif = $data["tahun_ajaran_aktif"];
    //     $this->semester_aktif = $data["semester_aktif"];
    // }
    public function render()
    {
        $this->kelasAktif = DB::table('list_kelas_aktif')
        ->get();
        return view('livewire.sekolah.manajemen-kelas.kelas-aktif.list-kelas-aktif');
    }

    public function editKelasAktif($id) {
        $this->emit('editKelasAktif', $id);
    }
}
