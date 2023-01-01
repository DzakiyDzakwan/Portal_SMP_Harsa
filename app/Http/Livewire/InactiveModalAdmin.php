<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class InactiveModalAdmin extends Component
{
    public $uuid;

    protected $listeners = [
        'adminInactive' => 'render',
        'getRestoreModal',
    ];

    public function render()
    {
        return view('livewire.user.manajemen-akun.admin.inactive-modal-admin');
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
        DB::select('CALL restore_admin(?, ?)', [$this->uuid, auth()->user()->uuid]);
        $this->closeRestoreModal();
        $this->emit('adminRestore');
    }
}
