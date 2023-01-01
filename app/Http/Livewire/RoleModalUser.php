<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleModalUser extends Component
{
    public $username, $uuid;

    public $userRole;

    protected $listeners = [
        'userRole' => 'showModal',
    ];

    public function render()
    {
        $role = Role::all();
        return view('livewire.role-modal-user', compact('role'));
    }

    public function showModal($user) {
        $data = User::where('uuid', $user)->first();
        $this->uuid = $user;
        $this->username = $data->username;
        $this->userRole = [];
        if($data->roles != null) {
            foreach($data->roles as $item) {
                $this->userRole[] = $item->name;
            }
        }
        $this->dispatchBrowserEvent('role-modal');
    }

    public function update() {
        $user = User::where('uuid', $this->uuid)->first();
        $user->syncRoles($this->userRole);
        $this->dispatchBrowserEvent('role-modal');
        $this->dispatchBrowserEvent('role-alert');
        $this->emit('assignRole');
    }
}
