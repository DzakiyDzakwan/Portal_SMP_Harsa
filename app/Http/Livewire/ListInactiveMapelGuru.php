<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ListInactiveMapelGuru extends Component
{
    public $inactiveMapelGuru;

    protected $listeners = [
        'inactiveMapelGuru' => 'render',
        'deleteMapelGuru' => 'render',
        'restoreMapelGuru' => 'render'
    ];

    public function render()
    {
        $this->inactiveMapelGuru = DB::table('mapel_gurus')->where('deleted_at', '<>', null)->get();
        return view('livewire.list-inactive-mapel-guru');
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
