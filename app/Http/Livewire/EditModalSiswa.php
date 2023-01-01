<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;

class EditModalSiswa extends Component
{
    public $siswas, $nama, $nisn, $oldnis, $nis, $user;

    protected $listeners = [
        'editUser' => 'showModal'
    ];

    protected $rules = [
        'nama' => 'required',
        'nis' => 'required|max:4'
    ];

    public function updated($fields) {
        $this->validateOnly($fields);
    }

    public function render()
    {
        $this->siswas = User::join('siswas', 'siswas.user', '=', 'users.uuid')->join('user_profiles', 'user_profiles.user', '=', 'users.uuid')->get();
        return view('livewire.user.manajemen-akun.siswa.edit-modal-siswa');
    }

    public function showModal($id) {
        // dd($id);
        //SELECT users.uuid, siswas.NIS, siswas.NISN, user_profiles.nama FROM users JOIN siswas ON siswas.user = users.uuid JOIN user_profiles ON user_profiles.user = users.uuid;
        $data = Siswa::join('users', 'users.uuid', '=', 'siswas.user')->join('user_profiles', 'user_profiles.user', '=', 'users.uuid')->where('siswas.user', $id)->first();

        $this->nama = $data->nama;
        $this->nisn = $data->NISN;
        $this->nis = $data->NIS;
        $this->oldnis = $data->NIS;
        $this->user = $data->user;

        $this->dispatchBrowserEvent('edit-modal');
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required',
            'nis' => 'required|max:4'
        ]);

        DB::select('CALL update_siswa(?, ?, ?, ?)', [$this->oldnis, $this->nis, $this->nama, auth()->user()->uuid]);
        
        $this->emit('siswaUpdate');
        $this->dispatchBrowserEvent('update-alert');
        $this->dispatchBrowserEvent('edit-modal');
        $this->render();
    }
}
