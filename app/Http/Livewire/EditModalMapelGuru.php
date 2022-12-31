<?php

namespace App\Http\Livewire;

use App\Models\Guru;
use Livewire\Component;
use App\Models\MapelGuru;
use App\Models\LogActivity;
use Illuminate\Support\Facades\DB;

class EditModalMapelGuru extends Component
{
    public $mapel_guru_id, $mapel, $guru, $pelajaran, $guruu;

    protected $rules = [
        'mapel' => 'required',
        'guru' => 'required'
    ];

    protected $listeners = [
        'editUser' => 'showModal'
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function showModal($mapel_guru_id)
    {
        //dd($mapel_guru_id);
        $data =  MapelGuru::where('mapel_guru_id', $mapel_guru_id)->first();
        $this->mapel_guru_id = $mapel_guru_id;
        $this->dispatchBrowserEvent('edit-modal');
    }

    public function render()
    {
        $this->pelajaran = DB::table('mapels')->get();
        $this->guruu = Guru::select('gurus.NUPTK', 'user_profiles.nama')->join('users', 'gurus.user', '=', 'users.uuid')->join('user_profiles', 'users.uuid', '=', 'user_profiles.user')->where('status', 'aktif')->get();
        return view('livewire.sekolah.manajemen-mata-pelajaran.mata-pelajaran-guru.edit-modal-mapel-guru');
    }

    public function update()
    {

        MapelGuru::where('mapel_guru_id', $this->mapel_guru_id)->update([

            'mapel' => $this->mapel,
            'guru' => $this->guru
        ]);

        LogActivity::create([
            'actor' => auth()->user()->uuid,
            'action' => 'update',
            'at' => 'mapel_gurus'
        ]);



        //DB::select('CALL update_admin(?, ?, ?)', [auth()->user()->uuid, $this->uuid, $this->password]);

        $this->emit('mapelGuruUpdate');
        $this->dispatchBrowserEvent('update-alert');
        $this->dispatchBrowserEvent('edit-modal');
        $this->render();
    }
}
