<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CreateModalRole extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.user.manajemen-user.role.create-modal-role');
    }

    public function store() {
        DB::select('call add_role(?, ?)', [strtolower($this->name), auth()->user()->uuid]);
        $this->reset();
        $this->emit('createRole');
        $this->dispatchBrowserEvent('create-modal');
        $this->dispatchBrowserEvent('create-alert');
    }
}
