<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class InfoCardRole extends Component
{

    protected $listeners = [
        'createRole' => 'render',
        'deleteRole' => 'render'
    ];

    public function render()
    {
        $totalRole = Role::count();
        return view('livewire.user.role.info-card-role', compact('totalRole'));
    }
}
