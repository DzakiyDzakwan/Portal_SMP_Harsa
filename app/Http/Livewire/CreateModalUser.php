<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class CreateModalUser extends Component
{
    public $username, $password;

    protected $rules = [
        'username' => 'required|min:5',
        'password' => 'required'  
    ];

    public function updated($fields) {
        $this->validateOnly($fields);
    }

    public function store() {

        $this->validate([
            'username' => 'required|min:5',
            'password' => 'required'  
        ]);

        $this->password = Hash::make($this->password);

        DB::select('CALL add_admin(?, ?, ?)', [$this->username, $this->password, auth()->user()->uuid]);
        $this->reset();
        $this->emit('userStore');
        $this->dispatchBrowserEvent('close-create-modal');
    }

    public function render()
    {
        return view('admin.components.livewire.create-modal-user');
    }

    


}
