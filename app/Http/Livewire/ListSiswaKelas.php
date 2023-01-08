<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ListSiswaKelas extends Component
{
    public $kelas, $mapel;

    /* public function mount($kelas) {
        $this->kelas_di
    } */

    protected $listeners = [
        'store-nilai' => 'render'
    ];

    public function render()
    {
        $sesi = DB::table("list_sesi_penilaian")->whereRaw('status = "aktif" COLLATE utf8mb4_general_ci')->first();
        $siswa = DB::table('list_siswa_kelas')->where('kelas', $this->kelas)->get();
        return view('livewire.list-siswa-kelas', compact('siswa', 'sesi'));
    }

    public function showModal($id) {
        $this->emit('showModal', $id);
    }
}
