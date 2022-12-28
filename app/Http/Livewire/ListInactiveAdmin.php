<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class ListInactiveAdmin extends Component
{
    public $inactiveAdmin;

    protected $listeners = [
        'adminInactive' => 'render',
        'adminRestore' => 'render'
    ];

    public function render()
    {
        $this->inactiveAdmin = User::join('model_has_roles', 'model_has_roles.model_id', '=', 'users.uuid')->join('roles', 'roles.id', '=', 'model_has_roles.role_id')->where('roles.id', '3')->onlyTrashed()->get();
        return view('livewire.list-inactive-admin');
    }

    public function getRestoreModal($uuid){
        $this->emit('getRestoreModal', $uuid);
    }
}
