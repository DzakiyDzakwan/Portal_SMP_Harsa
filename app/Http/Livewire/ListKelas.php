<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kelas;
use Illuminate\Support\Facades\DB;

class ListKelas extends Component
{
    public $kelas;

    protected $listeners = [
        'storeKelas' => 'render',
        'updateKelas' => 'render'
    ];

    public function render()
    {
        $this->kelas = DB::table('table_kelas')->get();
        return view('admin.components.livewire.list-kelas');
    }

    public function inactiveKelas($id) {
        DB::select('call inactive_kelas(?, ?)', [$id, auth()->user()->uuid]);
        $this->render();
        $this->emit('inactiveKelas');
        $this->dispatchBrowserEvent('inactive-alert');
    }

    public function editKelas($id) {
        $this->emit('editUser', $id);
    }
}
