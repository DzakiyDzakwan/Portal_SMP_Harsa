<?php

namespace App\Http\Livewire;

use App\Models\Guru;
use App\Models\KelasAktif;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EditModalKelasAktif extends Component
{
    public $gurus, $kelas_aktif_id, $wali_kelas, $old_wali_kelas, $nama_wali;
    protected $listeners = [
        'editKelasAktif' => 'showModal'
    ];

    protected $rules = [
        'kelas_aktif_id' => 'required|max:6',
    ];

    public function updated($fields) {
        $this->validateOnly($fields);
    }

    public function render()
    {
        $this->gurus = Guru::select('gurus.NUPTK', 'user_profiles.nama')
        ->join('users', 'gurus.user', '=', 'users.uuid')
        ->join('user_profiles', 'users.uuid', '=', 'user_profiles.user')
        ->join('model_has_roles', 'model_has_roles.model_id', '=', 'gurus.user')
        ->where('model_has_roles.role_id', '=', "5")
        ->get();
        return view('livewire.sekolah.manajemen-kelas.kelas-aktif.edit-modal-kelas-aktif');
    }

    public function showModal($id) {
        $data = KelasAktif::where('kelas_aktif_id', $id)->first();
        $this->kelas_aktif_id = $id;
        $this->wali_kelas = $data->wali_kelas;
        $this->old_wali_kelas = $data->wali_kelas;
        $this->nama_wali = Guru::join('user_profiles', 'user_profiles.user', 'gurus.user')->where('gurus.NUPTK', $data->wali_kelas)->first()->nama;
        $this->dispatchBrowserEvent('edit-modal');
    }

    public function update() {
        DB::select('CALL update_kelasAktif(?, ?, ?)', [$this->kelas_aktif_id, $this->wali_kelas, auth()->user()->uuid]);

        $this->emit('updateKelasAktif');
        $this->dispatchBrowserEvent('update-alert');
        $this->dispatchBrowserEvent('edit-modal');
        $this->render();

    }
}
