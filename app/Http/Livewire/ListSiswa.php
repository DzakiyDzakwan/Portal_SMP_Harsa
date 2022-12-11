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
        'siswaNonaktif' => 'render',
    ];

    public function editSiswa($id) {
        $this->emit('editUser', $id);
    }

    public function inactive($user) {

        DB::select('CALL inactive_siswa(?, ?, ?)', [$user, $this->status, auth()->user()->uuid]);

        return back()->with('succes', 'Siswa berhasil di non-aktif kan');
        $this->render();
        $this->emit('siswaNonaktif');
    }

    public function render()
    {
        $this->siswas = User::withTrashed()->join('siswas', 'siswas.user', '=', 'users.uuid')->join('user_profiles', 'users.uuid', '=', 'user_profiles.user')->orderBy('siswas.created_at', 'DESC')->get();
        return view('admin.components.livewire.list-siswa');
    }
}
