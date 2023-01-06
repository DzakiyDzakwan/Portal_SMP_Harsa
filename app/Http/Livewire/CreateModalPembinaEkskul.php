<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Guru;
use App\Models\Ekstrakurikuler;

class CreateModalPembinaEkskul extends Component
{
    public $nama_guru, $nama_ekskul;

    protected $rules = [
        'nama_guru' => 'required'
    ];

    protected $listeners = [
        'editPembina' => 'showModal'
    ];

    public function updated($fields) {
        $this->validateOnly($fields);
    }


    
    public function render()
    {
        $guru = Guru::select('gurus.NUPTK', 'user_profiles.nama')
        ->join('users', 'gurus.user', '=', 'users.uuid')
        ->join('user_profiles', 'users.uuid', '=', 'user_profiles.user')
        ->join('model_has_roles', 'model_has_roles.model_id', '=', 'user_profiles.user')
        ->where('model_has_roles.role_id', '=', '4', 'AND', 'model_has_roles.role_id', '!=', '7')
        ->get();
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
