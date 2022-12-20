<?php

namespace App\Http\Livewire;

use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class InfoProfileSiswa extends Component
{
    public $siswa;

    protected $listeners = [
        'updateProfilSiswa'=> 'render'
    ];
    public function render()
    {
        $this -> siswa = Siswa::join('users', 'siswas.user', '=', 'users.uuid')
        ->join('user_profiles', 'user_profiles.user', '=', 'users.uuid')
        ->where('siswas.user', Auth::user()->uuid)
        ->first();
        return view('livewire.info-profile-siswa');
    }

    // public function editProfilSiswa($id) {
    //     $this->emit('editProfileSiswa', $id);
    //     return view('livewire.edit-profil-siswa');
    // }

}
