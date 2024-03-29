<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class ListInactiveUser extends Component
{

    protected $listeners = [
        'userStore' => 'render',
        'restoreUser' => 'render',
        'deleteUser' => 'render',
        'userNonaktif' => 'render'
    ];

    public function render()
    {
        $this->inactiveUser = User::onlyTrashed()->latest()->get();
        return view('livewire.list-inactive-user');
    }

    public function getRestoreModal($uuid){
        $this->emit('getRestoreModal', $uuid);
    }

    public function getDeleteModal($uuid){
        $this->emit('getDeleteModal', $uuid);
    }
}
