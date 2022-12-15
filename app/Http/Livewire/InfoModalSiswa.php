<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Prestasi;

class InfoModalSiswa extends Component
{
    public $nama, $nisn, $nis, $jk, $kelas, $status, $anak_ke, $n_ayah, $p_ayah, $n_ibu, $p_ibu, $alamat_ortu, $telp_ortu, $n_wali, $p_wali, $telp_wali, $prestasi;

    protected $listeners = [
        'infoSiswa' => 'showSiswa'
    ];

    public function render()
    {
        $this->prestasi = Prestasi::where('siswa', $this->nisn)->get();

        return view('livewire.info-modal-siswa');
    }

    public function showSiswa($id)
    {
        $data = User::withTrashed()->join('siswas', 'siswas.user', '=', 'users.uuid')->join('user_profiles', 'user_profiles.user', '=', 'users.uuid')->where('siswas.user', $id)->first();

        
        $data1 = Siswa::join('kelas', 'kelas.kelas_id', '=', 'siswas.kelas')->where('siswas.user', $id)->first();

        //profil
        $this->user = $id;
        $this->nama = $data->nama;
        $this->nisn = $data->NISN;
        $this->nis = $data->NIS;
        $this->jk = $data->jenis_kelamin;
        $this->kelas = $data1->nama_kelas;
        $this->status = $data->status;

        //profil pribadi
        $this->anak_ke = $data->anak_ke;
        $this->n_ayah = $data->nama_ayah;
        $this->p_ayah = $data->pekerjaan_ayah;
        $this->n_ibu = $data->nama_ibu;
        $this->p_ibu = $data->pekerjaan_ibu;
        $this->alamat_ortu = $data->alamat_orangtua;
        $this->telp_ortu = $data->telepon_orangtua;
        $this->n_wali = $data->nama_wali;
        $this->p_wali = $data->pekerjaan_wali;
        $this->telp_wali = $data->telepon_wali;
        $this->dispatchBrowserEvent('info-modal');
    }
}
