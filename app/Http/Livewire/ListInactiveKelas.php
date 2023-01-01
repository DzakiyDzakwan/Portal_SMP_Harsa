<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kelas;
use Illuminate\Support\Facades\DB;

class ListInactiveKelas extends Component
{
    public $inactiveKelas;

    protected $listeners = [
        'inactiveKelas' => 'render',
        'deleteKelas' => 'render',
        'restoreKelas' => 'render'
    ];

    public function render()
    {
        $this->inactiveKelas = DB::table('kelas')->where('deleted_at', '<>', null)->get();
        return view('livewire.sekolah.manajemen-kelas.kelas.list-inactive-kelas');
    }

    public function getRestoreModal($id) {
        $this->emit('getRestoreModal', $id);
    }

    public function getDeleteModal($id) {
        $this->emit('getDeleteModal', $id);
    }
}
