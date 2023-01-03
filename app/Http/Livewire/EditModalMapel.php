<?php

namespace App\Http\Livewire;

use App\Models\Mapel;
use Livewire\Component;
use App\Models\LogActivity;

class EditModalMapel extends Component
{
    public $kurikulum, $nama_mapel, $kelompok_mapel, $mapel_id;

    protected $listeners = [
        'editUser' => 'showModal'
    ];

    protected $rules = [
        'mapel_id' => 'required|max:4',
        'nama_mapel' => 'required',
        'kelompok_mapel' => 'required'
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function render()
    {
        return view('livewire.edit-modal-mapel');
    }

    public function showModal($id)
    {
        // dd($id);
        $data =  Mapel::where('mapel_id', $id)->first();
        $this->mapel_id = $id;
        $this->nama_mapel = $data->nama_mapel;
        $this->kelompok_mapel = $data->kelompok_mapel;
        $this->kurikulum = $data->kurikulum;
        $this->dispatchBrowserEvent('edit-modal');
    }

    public function update()
    {
        $this->validate([
            'mapel_id' => 'required',
            'nama_mapel' => 'required',
            'kelompok_mapel' => 'required'
        ]);

        Mapel::where('mapel_id', $this->mapel_id)->update([
            'mapel_id' => $this->mapel_id,
            'nama_mapel' => $this->nama_mapel,
            'kelompok_mapel' => $this->kelompok_mapel
        ]);

        LogActivity::create([
            'actor' => auth()->user()->uuid,
            'action' => 'update',
            'at' => 'mapels'
        ]);

        $this->emit('updateMapel');
        $this->dispatchBrowserEvent('edit-modal');
        $this->dispatchBrowserEvent('update-alert');
    }
}
