<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\LogActivity;
use Illuminate\Support\Facades\Hash;

class EditModalUser extends Component
{

    public $uuid, $username, $password;

    protected $listeners = [
        'userEdit' => 'showUser'
    ];

    protected $rules = [
        'username' => 'required|min:5',
        'password' => 'required'  
    ];

    public function updated($fields) {
        $this->validateOnly($fields);
    }

    public function render()
    {
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

        $this->emit('userUpdate');
        $this->reset();
    }

    public function showUser($user) {
        $data = User::where('uuid', $user)->first();
        $this->uuid = $data->uuid;
        $this->username = $data->username;
        $this->dispatchBrowserEvent('update-modal');
    }
}
