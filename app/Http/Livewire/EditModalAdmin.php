<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EditModalAdmin extends Component
{
    public $uuid, $username, $password;

    protected $listeners = [
        'editUser' => 'showModal'
    ];

    protected $rules = [
        'password' => 'required'
    ];

    public function updated($fields) {
        $this->validateOnly($fields);
    }

    public function render()
    {
        return view('livewire.user.manajemen-akun.admin.edit-modal-admin');
    }

    public function showModal($uuid) {
        //dd($uuid);
        $data = User::join('model_has_roles', 'model_has_roles.model_id', '=', 'users.uuid')->join('roles', 'roles.id', '=', 'model_has_roles.role_id')->where('users.uuid', $uuid)->first();
        $this->uuid = $uuid;
        $this->username = $data->username;

        $this->dispatchBrowserEvent('edit-modal');
    }

    public function update()
    {
        $this->validate([
            'password' => 'required'
        ]);

        $this->password = Hash::make($this->password);

        DB::select('CALL update_admin(?, ?, ?)', [auth()->user()->uuid, $this->uuid, $this->password]);

        $this->emit('adminUpdate');
        $this->reset();
        $this->dispatchBrowserEvent('update-alert');
        $this->dispatchBrowserEvent('edit-modal');
        $this->render();
    }

}
