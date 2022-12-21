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
        'siswaDelete' => 'render',
    ];

    public function render()
    {
        $this->siswas = User::withTrashed()->select('siswas.user', 'siswas.NISN', 'siswas.tanggal_masuk', 'siswas.status', 'user_profiles.nama', 'kontrak_semesters.grade')->join('siswas', 'siswas.user', '=', 'users.uuid')->join('user_profiles', 'users.uuid', '=', 'user_profiles.user')->join('kontrak_semesters', 'kontrak_semesters.siswa', '=', 'siswas.NISN')->orderBy('siswas.created_at', 'DESC')->get();
        return view('livewire.list-siswa');
    }

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

    public function delete($user) {

        DB::select('CALL delete_siswa(?, ?)', [$user, auth()->user()->uuid]);

        $this->render();
        $this->emit('siswaDelete');
        $this->dispatchBrowserEvent('delete-alert');
    }
    
}
