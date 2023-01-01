<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CreateModalPermission extends Component
{

    public $name;

    public function render()
    {
        return view('livewire.user.manajemen-user.permission.create-modal-permission');
    }

    public function store() {
        DB::select('call add_permission(?, ?)', [strtolower($this->name), auth()->user()->uuid]);
        $this->reset();
        $this->emit('createPermission');
        $this->dispatchBrowserEvent('create-modal');
        $this->dispatchBrowserEvent('create-alert');
    }
}
