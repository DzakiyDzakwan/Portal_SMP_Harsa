<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ListAdmin extends Component
{
    public $admin, $uuid;

    protected $listeners = [
        'adminStore'=> 'render',
        'adminUpdate' => 'render',
        'adminInactive' => 'render',
        'adminRestore' => 'render'
    ];

    public function render()
    {
        $this->admin = User::join('model_has_roles', 'model_has_roles.model_id', '=', 'users.uuid')->join('roles', 'roles.id', '=', 'model_has_roles.role_id')->where('roles.id', '3')->orderBy('users.created_at', 'ASC')->get();
        return view('livewire.list-admin');
    }

    public function editAdmin($uuid) {
        $this->emit('editUser', $uuid);
    }

    public function inactive($uuid) {

        DB::select('CALL inactive_admin(?, ?)', [$uuid, auth()->user()->uuid]);

        $this->render();
        $this->emit('adminInactive');
        $this->dispatchBrowserEvent('inactive-alert');
    }

    /* public function delete($uuid) {

        DB::select('CALL delete_admin(?, ?)', [auth()->user()->uuid, $uuid]);

        $this->render();
        $this->emit('adminDelete');
        $this->dispatchBrowserEvent('delete-alert');
    } */
}
