<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Guru;
use App\Models\User;
use App\Models\LogActivity;

class EditModalGuru extends Component
{

    public $oldnip, $nip, $jabatan, $user;

    protected $rules = [
        'nip' => 'required|min:18|max:18',
    ];

    protected $listeners = [
        'editGuru' => 'showModal'
    ];

    public function updated($fields) {
        $this->validateOnly($fields);
    }

    public function render()
    {
        return view('livewire.edit-modal-guru');
    }

    public function showModal($id) {
        $data = Guru::where('NIP', $id)->first();
        $this->nip = $data->NIP;
        $this->oldnip = $data->NIP;
        $this->jabatan = $data->jabatan;
        $this->user = $data->user;
        $this->dispatchBrowserEvent('edit-modal');
    }

    public function update() {
        $this->validate([
            'nip' => 'required|min:18|max:18',
        ]);

        Guru::where('NIP', $this->oldnip)->update([
            'NIP' => $this->nip,
            'jabatan' => $this->jabatan
        ]);

        LogActivity::create([
            'actor' => auth()->user()->uuid,
            'action' => 'update',
            'at' => 'gurus'
        ]);

        if($this->oldnip != $this->nip) {
            User::where('uuid', $this->user)->update([
                'username' => $this->nip
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
