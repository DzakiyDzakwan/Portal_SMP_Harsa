<?php

namespace App\Http\Livewire;

use App\Models\Mapel;
use Livewire\Component;
use App\Models\LogActivity;

class CreateModalMapel extends Component
{
    public $mapel_id, $nama_mapel, $kelompok_mapel, $kurikulum;

    protected $listeners = [
        'inactiveMapel' => 'render'
    ];

    protected $rules = [
        'mapel_id' => 'required|max:3|unique:mapel',
        'nama_mapel' => 'required',
        'kelompok_mapel' => 'required|min:1',
        'kurikulum' => 'required'
    ];


    public function store()
    {
        Mapel::create([
            'mapel_id' => $this->mapel_id,
            'nama_mapel' => $this->nama_mapel,
            'kelompok_mapel' => $this->kelompok_mapel,
            'kurikulum' => $this->kurikulum
        ]);

        LogActivity::create([
            'actor' => auth()->user()->uuid,
            'action' => 'insert',
            'at' => 'mapel'
        ]);

        $this->reset();
        $this->emit('mapelStore');
        $this->dispatchBrowserEvent('insert-alert');
        $this->dispatchBrowserEvent('close-create-modal');
    }

    public function render()
    {
        return view('livewire.create-modal-mapel');
    }
}
