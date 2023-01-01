<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\LogActivity;
use Illuminate\Support\Facades\DB;

class EditModalKelas extends Component
{

    public $gurus, $kelas_id, $nama_kelas, $old_wali_kelas, $wali_kelas, $nama_wali;

    protected $listeners = [
        'editKelas' => 'showModal'
    ];

    protected $rules = [
        'nama_kelas' => 'required|unique:kelas',
        'wali_kelas' => 'required'
    ];

    public function updated($fields) {
        $this->validateOnly($fields);
    }
    
    public function render()
    {
        $this->gurus = Guru::select('gurus.NUPTK', 'user_profiles.nama')->join('users', 'gurus.user', '=', 'users.uuid')->join('user_profiles', 'users.uuid', '=', 'user_profiles.user')->get();
        return view('livewire.sekolah.manajemen-kelas.kelas.edit-modal-kelas');
    }

    public function showModal($id) {
        
        $data = Kelas::where('kelas_id', $id)->first();
        $this->kelas_id = $id;
        $this->wali_kelas = $data->wali_kelas;
        $this->old_wali_kelas = $data->wali_kelas;
        $this->nama_wali = Guru::join('user_profiles', 'user_profiles.user', 'gurus.user')->where('gurus.NUPTK', $data->wali_kelas)->first()->nama;
        $this->nama_kelas = $data->nama_kelas;
        $this->dispatchBrowserEvent('edit-modal');
    }

    public function update() {
        $this->validate([
            'nama_kelas' => 'required',
            'wali_kelas' => 'required'
        ]);
        DB::select('CALL update_kelas(?, ?, ?, ?)', [$this->kelas_id, $this->nama_kelas, $this->wali_kelas, auth()->user()->uuid]);

        // Kelas::where('kelas_id', $this->kelas_id)->update([
        //     'nama_kelas' => $this->nama_kelas,
        //     'wali_kelas' => $this->wali_kelas
        // ]);

        // LogActivity::create([
        //     'actor' => auth()->user()->uuid,
        //     'action' => 'update',
        //     'at' => 'kelas'
        // ]);

        // if($this->old_wali_kelas != $this->wali_kelas) {
        //     Guru::where('NIP', $this->old_wali_kelas)->update([
        //         'is_wali_kelas' => 'tidak'
        //     ]);
    
        //     LogActivity::create([
        //         'actor' => auth()->user()->uuid,
        //         'action' => 'update',
        //         'at' => 'gurus'
        //     ]);
        
        //     Guru::where('NIP', $this->wali_kelas)->update([
        //         'is_wali_kelas' => 'iya'
        //     ]);
    
        //     LogActivity::create([
        //         'actor' => auth()->user()->uuid,
        //         'action' => 'update',
        //         'at' => 'gurus'
        //     ]);
        // }

        $this->emit('updateKelas');
        $this->dispatchBrowserEvent('update-alert');
        $this->dispatchBrowserEvent('edit-modal');
        $this->render();

    }
}
