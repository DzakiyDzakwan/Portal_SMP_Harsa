<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class InfoCardWaliKelas extends Component
{
    public $totalWaliKelas;

    public function render()
    {
        $this->totalWaliKelas = User::join('model_has_roles', 'model_has_roles.model_id', '=', 'users.uuid')->join('roles', 'roles.id', '=', 'model_has_roles.role_id')->where('roles.id', '5')->count();
        return view('livewire.sekolah.manajemen-kelas.wali-kelas.info-card-wali-kelas');
    }
}
