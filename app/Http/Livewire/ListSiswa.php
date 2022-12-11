<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ListSiswa extends Component
{
    public $siswas, $user, $status;

    protected $listeners = [
        'siswaStore'=> 'render',
        'siswaUpdate'=> 'render',
    ];

    public function editSiswa($user) {
        $siswa = $user;
        $this->emit('siswaEdit', $siswa);
    }

    public function inactive($user) {

        DB::select('CALL inactive_siswa(?, ?, ?)', [$user, $this->status, auth()->user()->uuid]);

        return back()->with('succes', 'Siswa berhasil di non-aktif kan');
        $this->render();
        $this->emit('siswaNonaktif');
    }

    public function render()
    {
        $this->siswas = User::join('siswas', 'siswas.user', '=', 'users.uuid')->join('user_profiles', 'users.uuid', '=', 'user_profiles.user')->orderBy('siswas.created_at', 'DESC')->get();
        return view('admin.components.livewire.list-siswa');
    }
}
