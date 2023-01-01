<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ListTahunAkademik extends Component
{

    protected $listeners = [
        'createTahun' => 'render',
        'updateTahun' => 'render'
    ];

    public function render()
    {
        $tahunAkademik = DB::table('list_tahun_ajaran')->get();
        return view('livewire.sekolah.tahun-akademik.list-tahun-akademik', compact('tahunAkademik'));
    }

    public function editTahun($id) {
        $this->emit('editTahun', $id);
    }
}
