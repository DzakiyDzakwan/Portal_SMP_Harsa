<?php

namespace App\Http\Livewire;

use App\Models\Guru;
use Livewire\Component;
use App\Models\MapelGuru;
use App\Models\Mapel;
use App\Models\LogActivity;
use Illuminate\Support\Facades\DB;

class CreateModalMapelGuru extends Component
{
    public  $mapel, $guru;

    protected $listeners = [
        'inactiveMapelGuru' => 'render'
    ];

    protected $rules = [
        'mapel' => 'required',
        'guru' => 'required'
    ];

    public function store()
    {
        // MapelGuru::create([
        //     'mapel' => $this->mapel,
        //     'guru' => $this->guru
        // ]);

        // LogActivity::create([
        //     'actor' => auth()->user()->uuid,
        //     'action' => 'insert',
        //     'at' => 'mapel'
        // ]);
        DB::select('CALL add_mapelGuru(?, ?, ?)', [$this->mapel, $this->guru, auth()->user()->uuid]);
        $this->reset();
        $this->emit('storeMapelGuru');
        $this->dispatchBrowserEvent('insert-alert');
        $this->dispatchBrowserEvent('close-create-modal');
    }


    public function render()
    {
        /* $this->pelajaran = Mapel::get();
        $this->guruu = Guru::select('gurus.NUPTK', 'user_profiles.nama')->join('users', 'gurus.user', '=', 'users.uuid')->join('user_profiles', 'users.uuid', '=', 'user_profiles.user')->where('status', 'aktif')->where('jabatan', '<>', 'ks')->where('jabatan', '<>', 'tu')->get(); */
        $listMapel = DB::table('mapels')->get();
        $listGuru = Guru::select('gurus.NUPTK', 'user_profiles.nama')->join('users', 'gurus.user', '=', 'users.uuid')->join('user_profiles', 'users.uuid', '=', 'user_profiles.user')->where('status', 'aktif')->where('jabatan', '<>', 'ks')->where('jabatan', '<>', 'tu')->get();
        return view('livewire.sekolah.manajemen-mata-pelajaran.mata-pelajaran-guru.create-modal-mapel-guru', compact('listMapel', 'listGuru'));
    }
}
