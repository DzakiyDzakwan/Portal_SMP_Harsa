<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class InfoCardUser extends Component
{

    public $totalUser, $totalActiveUser, $totalInactiveUser;
    protected $listeners = [
        'userStore'=> 'render',
        'userNonaktif' => 'render'
    ];

    public function render()
    {
        $this->totalUser = User::withTrashed()->count();
        $this->totalActiveUser = User::withoutTrashed()->count();
        $this->totalInactiveUser = User::onlyTrashed()->count();

        return view('admin.components.livewire.info-card-user');
    }
}