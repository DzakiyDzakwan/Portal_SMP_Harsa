<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class CreateModalUser extends Component
{
    public $username, $password;

    public function render()
    {
        return view('admin.components.livewire.create-modal-user');
    }

    public function store() {
        $this->validate([
            'username' => 'required|max:255|min:5',
            'password' => 'required|max:255|min:5',
        ]);

        $this->password = Hash::make($this->password);

        DB::select('CALL add_admin(?, ?, ?)', [$this->username, $this->password, auth()->user()->uuid]);
        $this->reset();
        $this->emit('userStore');
    }


}
