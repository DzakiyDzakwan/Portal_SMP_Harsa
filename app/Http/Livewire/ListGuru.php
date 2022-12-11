<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class ListGuru extends Component
{
    public $gurus;

    protected $listeners = [
        'storeGuru' => 'render',
        'updateGuru' => 'render'
    ];

    public function render()
    {
        $this->gurus = User::withTrashed()->join('gurus', 'gurus.user', '=', 'users.uuid')->join('user_profiles', 'users.uuid', '=', 'user_profiles.user')->orderBy('gurus.created_at', 'DESC')->get();
        return view('admin.components.livewire.list-guru');
    }

    public function editGuru($id) {
        $this->emit('editGuru', $id);
    }
}
