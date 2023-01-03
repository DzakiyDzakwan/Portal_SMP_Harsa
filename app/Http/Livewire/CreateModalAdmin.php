<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class CreateModalAdmin extends Component
{
    public $NUPTK, $nama, $tgl_masuk, $jenis_kelamin;

    protected $rules = [
        'nama' => 'required|max:255',
        'NUPTK' => 'required|min:16|max:18|unique:gurus',
        'tgl_masuk' => 'required'
    ];

    public function mount() {
        $this->jenis_kelamin = 'LK';
    }

    public function updated($fields) {
        $this->validateOnly($fields);
    }

    public function store() {

        $this->validate([
            'nama' => 'required|max:255',
            'NUPTK' => 'required|min:16|max:18',
            'tgl_masuk' => 'required'
        ]);

        $password = Hash::make($this->NUPTK);

        DB::select('CALL add_admin(?, ?, ?, ?, ?, ?)', [$this->nama, $this->NUPTK, $password, $this->tgl_masuk, $this->jenis_kelamin, auth()->user()->uuid]);

        $this->reset();
        $this->emit('adminStore');
        $this->dispatchBrowserEvent('close-create-modal');
        $this->dispatchBrowserEvent('insert-alert');
    }

    public function render()
    {
        return view('livewire.user.manajemen-akun.admin.create-modal-admin');
    }
}
