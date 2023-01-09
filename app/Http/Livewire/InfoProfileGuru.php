<?php

namespace App\Http\Livewire;

use App\Models\Guru;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class InfoProfileGuru extends Component
{
    public $guru;

    protected $listeners = [
        'updateProfilGuru'=> 'render'
    ];
    public function render()
    {
        $this -> guru = Guru::join('users', 'gurus.user', '=', 'users.uuid')
        ->join('user_profiles', 'user_profiles.user', '=', 'users.uuid')
        ->where('gurus.user', Auth::user()->uuid)
        ->first();
        return view('livewire.info-profile-guru');
    }

}
