<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class EditModalRole extends Component
{

    public $name, $role_id;

    protected $listeners = [
        'editRole' => 'showModal'
    ];

    public function render()
    {
        return view('livewire.edit-modal-role');
    }

    public function showModal($id) {
        $data = Role::where('id', $id)->first();
        $this->role_id = $data->id;
        $this->name = $data->name;
        $this->dispatchBrowserEvent('edit-modal');
    }

    public function update() {
        DB::select('call update_role(?, ?, ?)', [$this->role_id, $this->name, auth()->user()->uuid]);
        $this->emit('updateRole');
        $this->dispatchBrowserEvent('edit-modal');
        $this->dispatchBrowserEvent('update-alert');
    }
}
