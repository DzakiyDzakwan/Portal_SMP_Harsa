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
        'updateKelas' => 'render',
        'restoreKelas' => 'render'
    ];

    public function render()
    {
        $this->kelas = DB::table('kelas')
        ->where('deleted_at', '=', null)
        ->get();
        return view('livewire.sekolah.manajemen-kelas.kelas.list-kelas');
    }

    public function inactiveKelas($id) {
        // $wk = Kelas::select('kelas.wali_kelas', 'gurus.user')
        // ->join('gurus', 'gurus.NUPTK', '=', 'kelas.wali_kelas')
        // ->where('kelas_id', $id)
        // ->first();

        // $user = $wk->user;

        DB::select('call inactive_kelas(?, ?)', [$id, auth()->user()->uuid]);
        $this->render();
        $this->emit('inactiveKelas');
        $this->dispatchBrowserEvent('inactive-alert');
    }
    public function editKelas($id) {
        $this->emit('editKelas', $id);
    }
}
