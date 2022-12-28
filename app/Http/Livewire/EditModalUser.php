<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\LogActivity;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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
        return view('livewire.user.manajemen-user.user.edit-modal-user');
    }

    public function showUser($user) {
        $data = User::where('uuid', $user)->first();
        $this->uuid = $user;
        $this->username = $data->username;
        $this->dispatchBrowserEvent('update-modal');
        
    }

    public function update() 
    {
        $this->validate([
            'username' => 'required|max:255|min:5',
            'password' => 'required|max:255|min:5',
        ]);

        $this->password = Hash::make($this->password);

        try {
            DB::select('CALL update_user(?, ?, ?)', [auth()->user()->uuid, $this->uuid, $this->password]);
    
            $this->emit('userUpdate');
            $this->reset();
            $this->dispatchBrowserEvent('update-modal');
            $this->dispatchBrowserEvent('update-alert');
        } catch (\Throwable $th) {
            DB::rollback();
        }
    }
}
