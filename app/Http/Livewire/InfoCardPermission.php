<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class InfoCardPermission extends Component
{

    protected $listeners = [
        'deletePermission' => 'render'
    ];

    public function render()
    {
        $totalPermission = Permission::count();
        return view('livewire.user.permission.info-card-permission', compact('totalPermission'));
    }
}
