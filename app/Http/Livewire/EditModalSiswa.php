<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Siswa;
use App\Models\UserProfile;
use App\Models\LogActivity;

class EditModalSiswa extends Component
{
    public $siswas, $nisn, $nis;

    protected $listeners = [
        'editUser' => 'showModal'
    ];

    protected $rules = [
        'nama' => 'required',
        'nis' => 'required|max:4'
    ];

    public function updated($fields) {
        $this->validateOnly($fields);
    }

    public function render()
    {
        $this->siswas = User::join('siswas', 'siswas.user', '=', 'users.uuid')->join('user_profiles', 'user_profiles.user', '=', 'users.uuid')->get();
        return view('admin.components.livewire.edit-modal-siswa');
    }

    public function showModal($id) {
        // dd($id);
        $data = User::join('siswas', 'siswas.user', '=', 'users.uuid')->join('user_profiles', 'user_profiles.user', '=', 'users.uuid')->where('siswas.user', $id)->first();
        $this->user = $id;
        $this->nama = $data->nama;
        $this->nisn = $data->NISN;
        $this->nis = $data->NIS;

        $this->dispatchBrowserEvent('edit-modal');
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required',
            'nis' => 'required|max:4'
        ]);

        Siswa::where('user', $this->user)->update([
            'NIS' => $this->nis,
        ]);

        UserProfile::where('user', $this->user)->update([
            'nama' => $this->nama,
        ]);

        LogActivity::create([
            'actor' => auth()->user()->uuid,
            'action' => 'update',
            'at' => 'siswas'
        ]);

        $this->emit('siswaUpdate');
        $this->dispatchBrowserEvent('update-alert');
        $this->dispatchBrowserEvent('edit-modal');
        $this->render();
    }
}
