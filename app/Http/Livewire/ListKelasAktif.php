<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ListKelasAktif extends Component
{   
    public $kelasAktif;
    protected $listeners = [
        'storeKelasAktif' => 'render'
    ];
    public function render()
    {
        $this->kelasAktif = DB::table('list_kelas_aktif')
        ->get();
        return view('livewire.sekolah.manajemen-kelas.kelas-aktif.list-kelas-aktif');
    }
}
