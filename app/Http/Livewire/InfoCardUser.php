<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class InfoCardUser extends Component
{

    public $totalUser, $totalActiveUser, $totalInactiveUser;
    protected $listeners = [
        'userStore'=> 'render',
        'userNonaktif' => 'render',
        'restoreUser' => 'render',
        'deleteUser' => 'render'
    ];

    public function render()
    {
        $this->totalUser = User::withTrashed()->where('role', 'admin')->count();
        $this->totalActiveUser = User::withoutTrashed()->where('role', 'admin')->count();
        $this->totalInactiveUser = User::onlyTrashed()->where('role', 'admin')->count();

        return view('admin.components.livewire.info-card-user');
    }
}
