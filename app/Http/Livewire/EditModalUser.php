<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\LogActivity;
use Illuminate\Support\Facades\Hash;

class EditModalUser extends Component
{

    public $uuid, $sequences, $username, $password;

    public function mount($uuid, $sequences) {
        $this->uuid = $uuid;
        $this->sequences = $sequences;
    }

    public function render()
    {
        $user = User::where('uuid', $this->uuid)->get()[0];
        $this->username = $user->username;
        return view('admin.components.livewire.edit-modal-user');
    }

    public function update() 
    {
        $this->validate([
            'username' => 'required|max:255|min:5',
            'password' => 'required|max:255|min:5',
        ]);

        $this->password = Hash::make($this->password);

        User::where('uuid', $this->uuid)->update([
            'username' => $this->username,
            'password' => $this->password
        ]);

        LogActivity::create([
            'actor' => auth()->user()->uuid,
            'action' => 'update',
            'at' => 'users'
        ]);

        $this->emit('userStore');

    }
}
