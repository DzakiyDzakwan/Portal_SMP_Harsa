<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Prestasi;
use App\Models\LogActivity;

class CreateModalPrestasi extends Component
{

    public $siswa, $jenis_prestasi, $keterangan, $tgl_prestasi;
    
    protected $listeners = [
        'createPrestasi' => 'showModal'
    ];

    public function mount() {
        $this->jenis_prestasi = "Akademik";
    }

    public function render()
    {
        return view('livewire.create-modal-prestasi');
    }

    public function showModal($id) {
        $this->siswa = $id;
        $this->dispatchBrowserEvent('create-prestasi');
    }

    public function store() {
        Prestasi::create([
            'siswa' => $this->siswa,
            'jenis_prestasi' => $this->jenis_prestasi,
            'keterangan' => $this->keterangan,
            'tanggal_prestasi' => $this->tgl_prestasi
        ]);

        LogActivity::create([
            'actor' => auth()->user()->uuid,
            'action' => 'insert',
            'at' => 'prestasis'
        ]);

        $this->dispatchBrowserEvent('create-prestasi');
    }
}
