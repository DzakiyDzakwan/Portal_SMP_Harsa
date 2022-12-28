<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class ListPermission extends Component
{

    protected $listeners = [
        'createPermission' => 'render',
        'deletePermission' => 'render'
    ];

    public function render()
    {
        $permission = Permission::all();
        return view('livewire.user.manajemen-user.permission.list-permission', compact('permission'));
    }

    public function delete($id) {
        try {
            DB::select('call delete_permission(?, ?)', [$id, auth()->user()->uuid]);
            $this->emit('deletePermission');
            $this->dispatchBrowserEvent('delete-alert');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
