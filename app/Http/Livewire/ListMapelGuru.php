<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ListMapelGuru extends Component
{
    public $mapelguru;

    protected $listeners = [
        'storeMapelGuru' => 'render',
        'updateMapelGuru' => 'render'
    ];

    public function render()
    {
        $this->mapelguru = DB::table('list_mapel_guru')->get();
        return view('livewire.list-mapel-guru');
    }

    public function editMapelGuru($id)
    {
        $this->emit('editUser', $id);
    }
}
