<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\LogActivity;

class InactiveModalUser extends Component
{
    public $uuid;

    protected $listeners = [
        'getRestoreModal',
        'getDeleteModal'
    ];

    public function render()
    {
        return view('livewire.user.manajemen-user.user.inactive-modal-user');
    }

    public function inactiveModal() {
        $this->dispatchBrowserEvent('inactive-modal');
    }

    public function RestoreModal() {
        $this->dispatchBrowserEvent('restore-modal');
    }

    public function getRestoreModal($uuid) {
        $this->uuid = $uuid;
        $this->inactiveModal();
        $this->restoreModal();
    }

    public function closeRestoreModal() {
        $this->restoreModal();
        $this->inactiveModal();
    }

    public function restoreUser() {
        User::where('uuid', $this->uuid)->restore();
        $this->closeRestoreModal();
        $this->emit('restoreUser');
    }

    public function deleteModal() {
        $this->dispatchBrowserEvent('delete-modal');
    }

    public function getDeleteModal($uuid) {
        $this->uuid = $uuid;
        $this->inactiveModal();
        $this->deleteModal();
    }

    public function closeDeleteModal() {
        $this->deleteModal();
        $this->inactiveModal();
    }

    public function deleteUser() {
        User::where('uuid', $this->uuid)->forceDelete();
        LogActivity::create([
            'actor' => auth()->user()->uuid,
            'action' => 'delete',
            'at' => 'users'
        ]);

        $this->closeDeleteModal();
        $this->emit('deleteUser');
    }
    
}
