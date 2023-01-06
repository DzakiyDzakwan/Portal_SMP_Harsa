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
            if($item->hasRole('guru') && !$item->hasRole('pembina') && !$item->hasRole('wali')) {
                $listPembina[] = [
                    "NUPTK" => $item->NUPTK,
                    "nama" => $item->nama
                ];
            }
        }
        $ekstrakurikuler = DB::table('ekstrakurikulers')->select('ekstrakurikuler_id', 'nama', 'penanggung_jawab' )
        ->where('penanggung_jawab', NULL)
        ->get();

        if($listPembina != null) {
            $this->nama_guru = $listPembina[0]["NUPTK"];
        }

        if (!$ekstrakurikuler->isEmpty()) {
            $this->nama_ekskul = $ekstrakurikuler[0]->ekstrakurikuler_id;
        }
        
        return view('livewire.create-modal-pembina-ekskul', compact('listPembina', 'ekstrakurikuler'));
    }


    public function update() {
        DB::select('CALL assign_pembina(?, ?, ?)', [auth()->user()->uuid, $this->nama_ekskul, $this->nama_guru]);
        $this->render();
        $this->emit('updatePembinaEkskul');
        $this->dispatchBrowserEvent('insert-alert');
        $this->dispatchBrowserEvent('close-create-modal');
        // session()->flash('message', 'Kelas Berhasil dibuat');
    }
    
}
