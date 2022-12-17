<?php

namespace App\Http\Livewire;

use App\Models\Mapel;
use Livewire\Component;

class InactiveModalMapel extends Component
{
    public $mapel_id;

    protected $listeners = [
        'getRestoreModal',
        'getDeleteModal'
    ];

    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.inactive-modal-mapel');
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
        $this->mapel_id = $id;
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
        Mapel::where('mapel_id', $this->mapel_id)->restore();
        $this->closeRestoreModal();
        $this->dispatchBrowserEvent('restore-alert');
        $this->emit('restoreMapel');
    }

    public function deleteModal()
    {
        $this->dispatchBrowserEvent('delete-modal');
    }

    public function getDeleteModal($id)
    {
        $this->mapel_id = $id;
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
        Mapel::where('mapel_id', $this->mapel_id)->forceDelete();
        $this->closeDeleteModal();
        $this->dispatchBrowserEvent('delete-alert');
        $this->emit('deleteMapel');
    }
}
