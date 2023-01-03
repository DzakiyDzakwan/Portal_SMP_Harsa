<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class InfoCardAdmin extends Component
{
    public $totalAdmin;

    protected $listeners = [
        'adminStore'=> 'render',
        'adminDelete'=> 'render'
    ];

    public function render()
    {
        $this->totalAdmin = User::join('model_has_roles', 'model_has_roles.model_id', '=', 'users.uuid')->join('roles', 'roles.id', '=', 'model_has_roles.role_id')->where('roles.id', '3')->count();
        return view('livewire.info-card-admin');
    }
}
