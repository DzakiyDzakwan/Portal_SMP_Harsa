<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Prestasi;
use App\Models\LogActivity;
use Illuminate\Support\Facades\DB;

class CreateModalPrestasi extends Component
{

    public $siswa, $jenis_prestasi, $keterangan, $tgl_prestasi;
    
    protected $listeners = [
        'createPrestasi' => 'showModal'
    ];

    public function mount() {
        $this->jenis_prestasi = "Akademik";
    }

    protected $rules = [
        'jenis_prestasi' => 'required',
        'keterangan' => 'required|max:255' ,
        'tgl_prestasi' => 'required'
    ];

    public function updated($fields) {
        $this->validateOnly($fields);
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

        $this->validate([
            'jenis_prestasi' => 'required',
            'keterangan' => 'required|max:255' ,
            'tgl_prestasi' => 'required'
        ]);

        DB::beginTransaction();

        try {
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
            DB::commit();
            $this->reset();
            $this->dispatchBrowserEvent('insert-prestasi-alert');
        } catch (\Throwable $th) {
            DB::rollback();
        }

        $this->dispatchBrowserEvent('create-prestasi');
    }
}
