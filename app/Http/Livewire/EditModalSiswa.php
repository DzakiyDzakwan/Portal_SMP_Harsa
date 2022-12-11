<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class EditModalSiswa extends Component
{
    public $uuid, $nis, $nama, $data;

    public function render()
    {

        return view('admin.components.livewire.edit-modal-siswa');
    }

    public function showSiswa($uuid) {
        $data = User::join('siswas', 'siswas.user', '=', 'users.uuid')->join('user_profiles', 'users.uuid', '=', 'user_profiles.user')->orderBy('siswas.created_at', 'DESC')->where('user', $uuid)->first();
        // $this->uuid = $data->uuid;
        $this->nis = $data->nis;
        $this->nama = $data->nama;
        $this->dispatchBrowserEvent('update-modal');
    }
}
