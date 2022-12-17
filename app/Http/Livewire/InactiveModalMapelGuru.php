<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MapelGuru;

class InactiveModalMapelGuru extends Component
{
    public $mapel_guru_id;

    protected $listeners = [
        'getRestoreModal',
        'getDeleteModal'
    ];

    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.inactive-modal-mapel-guru');
    }

    public function inactiveModal()
    {
        $this->dispatchBrowserEvent('inactive-modal');
    }

    public function RestoreModal()
    {
        $this->dispatchBrowserEvent('restore-modal');
    }

    public function getRestoreModal($id)
    {
        $this->mapel_guru_id = $id;
        $this->inactiveModal();
        $this->restoreModal();
    }

    public function closeRestoreModal()
    {
        $this->restoreModal();
        $this->inactiveModal();
    }

    public function restoreUser()
    {
        MapelGuru::where('mapel_guru_id', $this->mapel_guru_id)->restore();
        $this->closeRestoreModal();
        $this->dispatchBrowserEvent('restore-alert');
        $this->emit('restoreMapelGuru');
    }

    public function deleteModal()
    {
        $this->dispatchBrowserEvent('delete-modal');
    }

    public function getDeleteModal($id)
    {
        $this->mapel_guru_id = $id;
        $this->inactiveModal();
        $this->deleteModal();
    }

    public function closeDeleteModal()
    {
        $this->deleteModal();
        $this->inactiveModal();
    }

    public function deleteUser()
    {
        MapelGuru::where('mapel_guru_id', $this->mapel_guru_id)->forceDelete();
        $this->closeDeleteModal();
        $this->dispatchBrowserEvent('delete-alert');
        $this->emit('deleteMapelGuru');
    }
}
