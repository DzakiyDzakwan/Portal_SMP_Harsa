<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ListInactiveMapel extends Component
{
    public $inactiveMapel;

    protected $listeners = [
        'inactiveMapel' => 'render',
        'deleteMapel' => 'render',
        'restoreMapel' => 'render'
    ];

    public function render()
    {
        $this->inactiveMapel = DB::table('mapels')->where('deleted_at', '<>', null)->get();
        return view('livewire.list-inactive-mapel');
    }

    public function getRestoreModal($id)
    {
        $this->emit('getRestoreModal', $id);
    }

    public function getDeleteModal($id)
    {
        $this->emit('getDeleteModal', $id);
    }
}
