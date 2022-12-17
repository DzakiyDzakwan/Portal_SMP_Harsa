<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ListMapelGuru extends Component
{
    public $mapelGuru;

    protected $listeners = [
        'mapelGuruStore' => 'render',
        'mapelGuruUpdate' => 'render',
        'mapelGuruRestore' => 'render',
    ];

    public function editMapelGuru($id)
    {
        $this->emit('editUser', $id);
    }

    public function inactiveMapelGuru($id)
    {
        DB::select('call inactive_mapel(?, ?)', [$id, auth()->user()->uuid]);
        $this->render();
        $this->emit('inactiveMapelGuru');
        $this->dispatchBrowserEvent('inactive-alert');
    }

    public function render()
    {
        $this->mapelGuru = DB::table('list_mapel_guru')->get();
        return view('livewire.list-mapel-guru');
    }
}
