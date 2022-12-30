<?php

namespace App\Http\Livewire;

use App\Models\Mapel;
use Livewire\Component;
use App\Models\LogActivity;
use Illuminate\Support\Facades\DB;

class CreateModalMapel extends Component
{
    public $mapel_id, $nama_mapel, $kelompok_mapel, $kkm, $kurikulum;

    protected $listeners = [
        'inactiveMapel' => 'render'
    ];

    protected $rules = [
        'mapel_id' => 'required|max:3|unique:mapel',
        'nama_mapel' => 'required',
        'kelompok_mapel' => 'required|min:1',
        'kkm' => 'required',
        'kurikulum' => 'required'
    ];


    public function store()
    {
        DB::select('CALL add_mapel(?, ?, ?, ?, ?, ?)', [$this->mapel_id, $this->nama_mapel, $this->kelompok_mapel, $this->kkm, $this->kurikulum, auth()->user()->uuid]);

        $this->reset();
        $this->emit('mapelStore');
        $this->dispatchBrowserEvent('insert-alert');
        $this->dispatchBrowserEvent('close-create-modal');
    }

    public function render()
    {
        return view('livewire.sekolah.manajemen-mata-pelajaran.mata-pelajaran.create-modal-mapel');
    }
}
