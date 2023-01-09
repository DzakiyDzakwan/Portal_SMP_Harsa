<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class InactiveModalGuru extends Component
{
    public $user, $uuid;
    protected $listeners = [
        'adminInactive' => 'render',
        'getRestoreModal'
    ];
    public function render()
    {
        return view('livewire.user.manajemen-akun.guru.inactive-modal-guru');
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
        DB::select('CALL restore_guru(?, ?)', [$this->uuid, auth()->user()->uuid]);
        $this->closeRestoreModal();
        $this->emit('guruRestore');
    }
}
