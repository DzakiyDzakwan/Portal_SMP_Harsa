<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class ListRole extends Component
{

    protected $listeners = [
        'createRole' => 'render',
        'updateRole' => 'render',
    ];

    public function render()
    {
        $roles = Role::all();
        return view('livewire.user.manajemen-user.role.list-role', compact('roles'));
    }

    public function permissionRole($id) {
        $this->emit('rolePermission', $id);
    }

    public function editRole($id) {
       $this->emit('editRole', $id);
    }

    public function delete($id) {
        try {
            DB::select('call delete_role(?,?)', [$id, auth()->user()->uuid]);
            $this->emit('deleteRole');
            $this->dispatchBrowserEvent('delete-alert');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
