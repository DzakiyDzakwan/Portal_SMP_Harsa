<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ListSiswaKelas extends Component
{
    public $kelas_id;

    /* public function mount($kelas_id) {
        $this->kelas_di
    } */

    public function render()
    {
        $siswa = DB::table('list_siswa_kelas')->where('kelas', $this->kelas_id)->get();
        return view('livewire.list-siswa-kelas', compact('siswa'));
    }

    public function showModal($id) {
        $this->emit('showModal', $id);
    }
}
