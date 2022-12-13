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

    public function infoSiswa($id) {
        $this->emit('infoSiswa', $id);
    }

    public function inactive($user) {

        DB::select('CALL inactive_siswa(?, ?, ?)', [$user, $this->status, auth()->user()->uuid]);

        $this->render();
        $this->emit('siswaNonaktif');
        $this->dispatchBrowserEvent('inactive-alert');
    }

    public function render()
    {
        $this->siswas = User::withTrashed()->join('siswas', 'siswas.user', '=', 'users.uuid')->join('user_profiles', 'users.uuid', '=', 'user_profiles.user')->orderBy('siswas.created_at', 'DESC')->get();
        return view('livewire.list-siswa');
    }
}
