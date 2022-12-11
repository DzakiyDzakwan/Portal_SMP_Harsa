<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Guru;

class CreateModalGuru extends Component
{

    public $nama, $jenis_kelamin, $nip, $jabatan, $tgl_masuk;

    protected $rules = [
        'nama' => 'required|max:255',
        'nip' => 'required|min:18|max:18',
        'tgl_masuk' => 'required'
    ];

    public function mount() {
        $this->jenis_kelamin = 'LK';
        $this->jabatan = 'wks';
    }

    public function updated($fields) {
        $this->validateOnly($fields);
    }

    public function render()
    {
        return view('admin.components.livewire.create-modal-guru');
    }

    public function store() {
        $this->validate([
            'nama' => 'required|max:255',
            'nip' => 'required|min:18|max:18',
            'tgl_masuk' => 'required'
        ]);

        $password = Hash::make($this->nip);

        DB::select('CALL add_guru(?, ?, ?, ?, ?, ?, ?)', [$this->nama, $this->nip, $this->jabatan, $password, $this->tgl_masuk, $this->jenis_kelamin, auth()->user()->uuid]);

        $this->reset();
        $this->emit('storeGuru');
        $this->dispatchBrowserEvent('close-create-modal');
        $this->dispatchBrowserEvent('insert-alert');

    }
}
