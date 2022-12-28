<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\LogActivity;

class ListRole extends Component
{

    protected $listeners = [
        'createRole' => 'render',
        'updateRole' => 'render',
    ];

    public function render()
    {
        $roles = Role::all();
        return view('livewire.user.role.list-role', compact('roles'));
    }

    public function permissionRole($id) {
        dd($id);
    }

    public function editRole($id) {
        dd($id);
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
