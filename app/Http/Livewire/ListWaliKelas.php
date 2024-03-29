<?php

namespace App\Http\Livewire;

use App\Models\Guru;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ListWaliKelas extends Component
{
    public $walis;

    protected $listeners = [
        'storeWaliKelas' => 'render',
    ];

    public function delete($id)
    {
        DB::table('model_has_roles')->where('model_id', $id)->where('role_id', '=', 5)->delete();
        $this->render();
        $this->emit('deleteWaliKelas');
        $this->dispatchBrowserEvent('delete-alert');
    }

    public function render()
    {

        $this->walis = User::role('5')->select('gurus.user', 'gurus.NUPTK', 'gurus.jabatan', 'gurus.status', 'user_profiles.nama')
            ->join('gurus', 'gurus.user', '=', 'users.uuid')
            ->join('user_profiles', 'users.uuid', '=', 'user_profiles.user')
            ->get();

        return view('livewire.sekolah.manajemen-kelas.wali-kelas.list-wali-kelas');
    }
}
