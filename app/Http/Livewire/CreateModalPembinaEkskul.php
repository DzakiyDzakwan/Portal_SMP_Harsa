<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Ekstrakurikuler;

class CreateModalPembinaEkskul extends Component
{
    public $nama_guru, $nama_ekskul;
    
    public function render()
    {
        $guru = User::join('gurus', 'gurus.user', '=', 'users.uuid')
        ->join('user_profiles', 'user_profiles.user', '=', 'users.uuid')
        ->where('gurus.jabatan', 'guru')
        ->get();

        $listPembina = [];

        foreach ($guru as $item) {
            if($item->hasRole('wali')) {
                $listPembina[] = [
                    "NUPTK" => $item->NUPTK,
                    "nama" => $item->nama
                ];
            }
        }
        dd($listPembina);
        /* $guru = Guru::select('gurus.NUPTK', 'user_profiles.nama')
        ->join('users', 'gurus.user', '=', 'users.uuid')
        ->join('user_profiles', 'users.uuid', '=', 'user_profiles.user')
        ->join('model_has_roles', 'model_has_roles.model_id', '=', 'user_profiles.user')
        ->where('gurus.jabatan', 'guru')
        ->where('model_has_roles.role_id', '<>', '7')
        ->where('model_has_roles.role_id', '<>', '5')
        ->get(); */
        $ekstrakurikuler = DB::table('ekstrakurikulers')->select('ekstrakurikuler_id', 'nama', 'penanggung_jawab' )
        // ->where('penanggung_jawab', '=', NULL)
        ->get();
        // dd($ekstrakurikuler);
        // dd($guru, $ekstrakurikuler);
        return view('livewire.create-modal-pembina-ekskul', compact('guru', 'ekstrakurikuler'));
    }


    public function update() {
        // dd($this);
        DB::select('CALL add_pembina_ekstrakurikuler(?, ?, ?)', [auth()->user()->uuid, $this->nama_ekskul, $this->nama_guru]);
        $this->render();
        $this->emit('updatePembinaEkskul');
        $this->dispatchBrowserEvent('insert-alert');
        $this->dispatchBrowserEvent('close-create-modal');
        // session()->flash('message', 'Kelas Berhasil dibuat');
    }
    
}
