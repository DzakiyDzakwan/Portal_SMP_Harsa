<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kelas;

class InactiveModalKelas extends Component
{

    public $kelas_id;

    protected $listeners = [
        'getRestoreModal',
        'getDeleteModal'
    ];

    public function render()
    {
        return view('admin.components.livewire.inactive-modal-kelas');
    }

    public function inactiveModal() {
        $this->dispatchBrowserEvent('inactive-modal');
    }

    public function RestoreModal() {
        $this->dispatchBrowserEvent('restore-modal');
    }

    public function getRestoreModal($id) {
        $this->kelas_id = $id;
        $this->inactiveModal();
        $this->restoreModal();
    }

    public function closeRestoreModal() {
        $this->restoreModal();
        $this->inactiveModal();
    }

    public function restoreUser() {
        Kelas::where('kelas_id', $this->kelas_id)->restore();
        $this->closeRestoreModal();
        $this->emit('restoreUser');
    }

    public function deleteModal() {
        $this->dispatchBrowserEvent('delete-modal');
    }

    public function getDeleteModal($id) {
        $this->kelas_id = $id;
        $this->inactiveModal();
        $this->deleteModal();
    }

    public function closeDeleteModal() {
        $this->deleteModal();
        $this->inactiveModal();
    }

    public function deleteUser() {
        Kelas::where('kelas_id', $this->kelas_id)->forceDelete();
        $this->closeDeleteModal();
        $this->emit('deleteUser');
    }
}
