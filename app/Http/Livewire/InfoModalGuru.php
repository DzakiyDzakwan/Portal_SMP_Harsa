<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class InfoModalGuru extends Component
{
   public $nama, $nip, $jabatan, $jenis_kelamin, $tgl_masuk, $status, $pendidikan, $tahun_ijazah, $status_perkawinan, $alamat_tinggal, $alamat_domisili, $tempat_lahir, $tgl_lahir, $foto;

    protected $listeners = [
        'infoGuru' => 'showModal'
    ];

    public function render()
    {
        return view('livewire.info-modal-guru');
    }

    public function showModal($id) {
        $data = User::withTrashed()->join('gurus', 'users.uuid', '=', 'gurus.user')->join('user_profiles', 'user_profiles.user', '=', 'users.uuid')->where('users.uuid', $id)->first();
        $this->nama = $data->nama;
        $this->nip = $data->NIP;
        $this->jabatan = $data->jabatan;
        $this->jenis_kelamin = $data->jenis_kelamin;
        $this->tgl_masuk = $data->tanggal_masuk;
        $this->status = $data->status;
        $this->pendidikan = $data->pendidikan;
        $this->tahun_ijazah = $data->tahun_ijazah;
        $this->status_perkawinan = $data->status_perkawinan;
        $this->alamat_tinggal = $data->alamat_tinggal;
        $this->alamat_domisili = $data->alamat_domisili;
        $this->tempat_lahir = $data->tempat_lahir;
        $this->tgl_lahir = $data->tgl_lagir;
        $this->foto = $data->foto;
        $this->dispatchBrowserEvent('info-modal');
    }
}
