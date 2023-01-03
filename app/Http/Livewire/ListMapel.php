<?php

namespace App\Http\Livewire;

use App\Models\Mapel;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ListMapel extends Component
{
    public $mapel;

    protected $listeners = [
        'mapelStore' => 'render',
        'mapelUpdate' => 'render',
        'mapelRestore' => 'render',
    ];

    public function editMapel($id)
    {
        $this->emit('editUser', $id);
    }

    public function inactiveMapel($id)
    {
        DB::select('call inactive_mapel(?, ?)', [$id, auth()->user()->uuid]);
        $this->render();
        $this->emit('inactiveMapel');
        $this->dispatchBrowserEvent('inactive-alert');
    }

    public function render()
    {
        $this->mapel = DB::table('list_mapel')->get();
        return view('livewire.list-mapel');
    }
}
