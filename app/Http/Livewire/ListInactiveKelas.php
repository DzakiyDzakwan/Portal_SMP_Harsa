<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kelas;

class ListInactiveKelas extends Component
{
    public $inactiveKelas;

    protected $listeners = [
        'inactiveKelas' => 'render'
    ];

    public function render()
    {
        $this->inactiveKelas = Kelas::onlyTrashed()->get();
        return view('admin.components.livewire.list-inactive-kelas');
    }

    public function getRestoreModal($id) {
        $this->emit('getRestoreModal', $id);
    }

    public function getDeleteModal($id) {
        $this->emit('getDeleteModal', $id);
    }
}
