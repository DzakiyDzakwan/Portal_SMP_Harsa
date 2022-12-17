<?php

namespace App\Http\Livewire;

use App\Models\Guru;
use Livewire\Component;
use App\Models\MapelGuru;
use App\Models\LogActivity;
use Illuminate\Support\Facades\DB;

class EditModalMapelGuru extends Component
{
    public $mapel_guru_id, $mapel_id, $nama, $mapel, $guru;

    protected $listeners = [
        'editUser' => 'showModal'
    ];

    protected $rules = [
        'mapel_guru_id' => 'required|max:4',
        'mapel' => 'required',
        'guru' => 'required'
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function render()
    {
        $this->pelajaran = DB::table('mapels')->get();
        $this->guruu = Guru::select('gurus.NIP', 'user_profiles.nama')->join('users', 'gurus.user', '=', 'users.uuid')->join('user_profiles', 'users.uuid', '=', 'user_profiles.user')->where('status', 'aktif')->get();
        return view('livewire.edit-modal-mapel-guru');
    }

    public function showModal($id)
    {
        // dd($id);
        $data =  MapelGuru::where('mapel_guru_id', $id)->first();
        $this->mapel_guru_id = $id;
        $this->mapel = $data->mapel;
        $this->guru = $data->guru;
        $this->dispatchBrowserEvent('edit-modal');
    }

    public function update()
    {
        $this->validate([
            'mapel_id' => 'required',
            'mapel' => 'required',
            'guru' => 'required'
        ]);

        MapelGuru::where('mapel_guru_id', $this->mapel_guru_id)->update([
            'mapel_guru_id' => $this->mapel_guru_id,
            'mapel' => $this->mapel,
            'guru' => $this->guru
        ]);

        LogActivity::create([
            'actor' => auth()->user()->uuid,
            'action' => 'update',
            'at' => 'mapel_gurus'
        ]);

        $this->emit('updateMapelGuru');
        $this->dispatchBrowserEvent('edit-modal');
        $this->dispatchBrowserEvent('update-alert');
    }
}
