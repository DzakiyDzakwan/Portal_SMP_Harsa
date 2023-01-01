<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Guru;
use App\Models\User;
use App\Models\LogActivity;

class EditModalGuru extends Component
{

    public $oldNUPTK, $NUPTK, $jabatan, $user;

    protected $rules = [
        'NUPTK' => 'required|min:16|max:18',
    ];

    protected $listeners = [
        'editGuru' => 'showModal'
    ];

    public function updated($fields) {
        $this->validateOnly($fields);
    }

    public function render()
    {
        return view('livewire.user.manajemen-akun.guru.edit-modal-guru');
    }

    public function showModal($id) {
        $data = Guru::where('NUPTK', $id)->first();
        $this->NUPTK = $data->NUPTK;
        $this->oldNUPTK = $data->NUPTK;
        $this->jabatan = $data->jabatan;
        $this->user = $data->user;
        $this->dispatchBrowserEvent('edit-modal');
    }

    public function update() {
        $this->validate([
            'NUPTK' => 'required|min:16|max:18',
        ]);

        Guru::where('NUPTK', $this->oldNUPTK)->update([
            'NUPTK' => $this->NUPTK,
            'jabatan' => $this->jabatan
        ]);

        LogActivity::create([
            'actor' => auth()->user()->uuid,
            'action' => 'update',
            'at' => 'gurus'
        ]);

        if($this->oldNUPTK != $this->NUPTK) {
            User::where('uuid', $this->user)->update([
                'username' => $this->NUPTK
            ]);

            LogActivity::create([
                'actor' => auth()->user()->uuid,
                'action' => 'update',
                'at' => 'users'
            ]);
        }

        $this->emit('updateGuru');
        $this->dispatchBrowserEvent('edit-modal');
        $this->dispatchBrowserEvent('update-alert');

        
    }

}
