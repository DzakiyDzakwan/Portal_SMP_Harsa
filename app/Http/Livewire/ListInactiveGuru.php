<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ListInactiveGuru extends Component
{
    public $gurus;
    protected $listeners = [
        'guruInactive' => 'render',
        'guruRestore' => 'render'
    ];
    public function render()
    {
        $this->gurus = DB::table('list_guru_inactive')
        ->get();
        return view('livewire.user.manajemen-akun.guru.list-inactive-guru');
    }
    public function getRestoreModal($uuid){
        $this->emit('getRestoreModal', $uuid);
    }
}
