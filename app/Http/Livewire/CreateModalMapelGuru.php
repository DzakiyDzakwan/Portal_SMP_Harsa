<?php

namespace App\Http\Livewire;

use App\Models\Guru;
use Livewire\Component;
use App\Models\MapelGuru;
use App\Models\LogActivity;
use Illuminate\Support\Facades\DB;

class CreateModalMapelGuru extends Component
{
    public $mapel_guru_id, $mapel, $guru, $guruu, $pelajaran;

    protected $listeners = [
        'inactiveMapelGuru' => 'render'
    ];

    protected $rules = [
        'mapel' => 'required',
        'guru' => 'required'
    ];

    public function store()
    {
        MapelGuru::create([
            'mapel' => $this->mapel,
            'guru' => $this->guru
        ]);

        LogActivity::create([
            'actor' => auth()->user()->uuid,
            'action' => 'insert',
            'at' => 'mapel'
        ]);

        $this->reset();
        $this->emit('mapelGuruStore');
        $this->dispatchBrowserEvent('insert-alert');
        $this->dispatchBrowserEvent('close-create-modal');
    }


    public function render()
    {
        $this->pelajaran = DB::table('mapels')->get();
        $this->guruu = Guru::select('gurus.NIP', 'user_profiles.nama')->join('users', 'gurus.user', '=', 'users.uuid')->join('user_profiles', 'users.uuid', '=', 'user_profiles.user')->where('status', 'aktif')->get();
        return view('livewire.create-modal-mapel-guru');
    }
}
