<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ListUser extends Component
{

    public $users;
    protected $listeners = [
        'userStore'=> 'render'
    ];

    public function render()
    {
        $this->users = User::all();
        return view('admin.components.livewire.list-user');
    }
    
    public function inactive($uuid) {
        DB::select('CALL inactive_admin(?)',[$uuid]);
        $this->render();
        $this->emit('userNonaktif');
    }
}
