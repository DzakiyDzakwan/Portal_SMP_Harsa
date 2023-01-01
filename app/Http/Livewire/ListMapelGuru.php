<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ListMapelGuru extends Component
{
    public $mapelguru;

    protected $listeners = [
        'storeMapelGuru' => 'render',
        'updateMapelGuru' => 'render',
        'deleteMapelGuru' => 'render'
    ];

    public function render()
    {
        $this->mapelguru = DB::table('list_mapel_guru')->get();
        return view('livewire.sekolah.manajemen-mata-pelajaran.mata-pelajaran-guru..list-mapel-guru');
    }

    public function delete($id)
    {
        DB::select('CALL delete_mapelGuru(?, ?)', [$id, auth()->user()->uuid]);

        $this->render();
        $this->emit('deleteMapelGuru');
        $this->dispatchBrowserEvent('inactive-alert');
    }

    public function editMapelGuru($id)
    {
        $this->emit('editUser', $id);
    }
}
