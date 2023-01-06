<?php

namespace App\Http\Livewire;

use App\Http\Controllers\guru\WaliKelasController;
use App\Models\Guru;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CreateModalWaliKelas extends Component
{
    public $model_id;

    protected $listeners = [
        'deleteWaliKelas' => 'render'
    ];

    public function store()
    {
        // dd($this);
        DB::select('CALL add_walikelas(?, ?)', [$this->model_id, auth()->user()->uuid]);
        $this->reset();
        $this->emit('storeWaliKelas');
        $this->dispatchBrowserEvent('insert-alert');
        $this->dispatchBrowserEvent('close-create-modal');
    }

    public function render()
    {

        $guru = User::join('gurus', 'gurus.user', '=', 'users.uuid')->join('user_profiles', 'users.uuid', '=', 'user_profiles.user')->where('gurus.jabatan', 'guru')->get();
        $listWali = [];

        foreach ($guru as $item) {
            if($item->hasRole('guru') && !$item->hasRole('pembina') && !$item->hasRole('wali')) {
                $listWali[] = [
                    "uuid" => $item->uuid,
                    "nama" => $item->nama
                ];
            }
        }
        return view('livewire.sekolah.manajemen-kelas.wali-kelas.create-modal-wali-kelas', compact('listWali'));
    }

}
