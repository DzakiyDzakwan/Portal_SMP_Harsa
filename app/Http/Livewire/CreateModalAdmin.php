<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class CreateModalAdmin extends Component
{
    public $NUPTK, $password, $tanggal_masuk;

    protected $rules = [
        'NUPTK' => 'required|min:16',
        'password' => 'required',
        'tanggal_masuk' => 'required' 
    ];

    public function updated($fields) {
        $this->validateOnly($fields);
    }

    public function store() {

        $this->validate([
            'NUPTK' => 'required|min:16',
            'password' => 'required',
            'tanggal_masuk' => 'required'  
        ]);

        $this->password = Hash::make($this->password);

        DB::select('CALL add_admin(?, ?, ?, ?)', [$this->NUPTK, $this->password, $this->tanggal_masuk, auth()->user()->uuid]);
        $this->reset();
        $this->emit('adminStore');
        $this->dispatchBrowserEvent('close-create-modal');
        $this->dispatchBrowserEvent('insert-alert');
    }

    public function render()
    {
        return view('livewire.create-modal-admin');
    }
}
