<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionModalRole extends Component
{
    public $role_id, $name;
    public $rolePermission;

    protected $listeners = [
        'rolePermission' => 'showModal'
    ];

    public function render()
    {
        $permission = Permission::all();
        return view('livewire.user.manajemen-user.role.permission-modal-role', compact('permission'));
    }

    public function showModal($id) {
        $this->role_id = $id;
        $data = Role::where('id', $id)->first();
        $this->name = $data->name;
        $this->rolePermission = [];
        if($data->permissions != null) {
            foreach($data->permissions as $item) {
                $this->rolePermission[] = $item->name;
            }
        }
        $this->dispatchBrowserEvent('permission-modal');
    }

    public function update() {
        $role = Role::where('id', $this->role_id)->first();
        $role->syncPermissions($this->rolePermission);
        $this->dispatchBrowserEvent('permission-modal');
        $this->dispatchBrowserEvent('permission-alert');
    }
}
