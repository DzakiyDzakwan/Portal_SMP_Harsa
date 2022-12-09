<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ListUser extends Component
{

    public $users;
    protected $listeners = [
        'userStore'=> 'render',
        'userUpdate' => 'render'
    ];

    public function render()
    {
        $this->users = User::latest()->get();
        return view('admin.components.livewire.list-user');
    }

    public function editUser($uuid) {
        $user = $uuid;
        $this->emit('userEdit', $user);
    }
    
    public function inactive($uuid) {
        DB::select('CALL inactive_admin(?)',[$uuid]);
        $this->render();
        $this->emit('userNonaktif');
    }
}