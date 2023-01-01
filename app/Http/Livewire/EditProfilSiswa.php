<?php

namespace App\Http\Livewire;

use App\Models\LogActivity;
use App\Models\Siswa;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Exists;
use Livewire\Component;
use Livewire\Event;
use Livewire\WithFileUploads;


class EditProfilSiswa extends Component
{
    use WithFileUploads;
    public $event, $data, $foto, $nama, $kelas, $email, $jenis_kelamin, $tgl_lahir, $tempat_lahir, $alamat_tinggal, $alamat_domisili, $anak_ke, $nama_ayah, $pekerjaan_ayah, $nama_ibu, $pekerjaan_ibu, $alamat_orangtua, $telepon_orangtua, $nama_wali, $pekerjaan_wali, $telepon_wali;
    protected $listeners = [
        'editProfilSiswa'=> 'render'
    ];
    public function render()
    {
        $data = Siswa::join('users', 'siswas.user', '=', 'users.uuid')
        ->join('user_profiles', 'user_profiles.user', '=', 'users.uuid')
        ->where('siswas.user', Auth::user()->uuid)->first();

        $this->nama = $data->nama;
        $this->email = $data->email;
        $this->jenis_kelamin = $data->jenis_kelamin;
        $this->tgl_lahir = $data->tgl_lahir;
        $this->tempat_lahir = $data->tempat_lahir;
        $this->alamat_tinggal = $data->alamat_tinggal;
        $this->alamat_domisili = $data->alamat_domisili;
        $this->anak_ke = $data->anak_ke;
        $this->nama_ayah = $data->nama_ayah;
        $this->pekerjaan_ayah = $data->pekerjaan_ayah;
        $this->nama_ibu = $data->nama_ibu;
        $this->pekerjaan_ibu = $data->pekerjaan_ibu;
        $this->alamat_orangtua = $data->alamat_orangtua;
        $this->telepon_orangtua = $data->telepon_orangtua;
        $this->nama_wali = $data->nama_wali;
        $this->pekerjaan_wali = $data->pekerjaan_wali;
        $this->telepon_wali = $data->telepon_wali;
        return view('livewire.edit-profil-siswa');
    }

    public function update()
    {
        $rules = [
            'email' => 'required|email',
            'nama' => 'required|max:100',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required|max:255',
            'anak_ke' => 'required',
            'nama_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'nama_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'alamat_orangtua' => 'required',
            'telepon_orangtua' => 'required',
            'foto' => 'nullable|file'
        ];

        $this->validate($rules);

        Siswa::where('user', Auth::user()->uuid)->update([
            'anak_ke' => $this->anak_ke,
            'nama_ayah' => $this->nama_ayah,
            'pekerjaan_ayah' => $this->pekerjaan_ayah,
            'nama_ibu' => $this->nama_ibu,
            'pekerjaan_ibu'=> $this->pekerjaan_ibu,
            'alamat_orangtua' => $this->alamat_orangtua,
            'telepon_orangtua' => $this->telepon_orangtua,
            'nama_wali'=> $this->nama_wali,
            'pekerjaan_wali' => $this->pekerjaan_wali,
            'telepon_wali' => $this->telepon_wali
        ]);
        User::where('uuid', Auth::user()->uuid);
        
    if(is_null($this->foto)){
        UserProfile::where('user', Auth::user()->uuid)
        ->update([
            'email' => $this->email,
            'nama' => $this->nama,
            'jenis_kelamin' => $this->jenis_kelamin,
            'tgl_lahir' => $this->tgl_lahir,
            'tempat_lahir' => $this->tempat_lahir,
            'alamat_tinggal' => $this->alamat_tinggal,
            'alamat_domisili' => $this->alamat_domisili,
        ]);
    } else {
        $imageName = md5($this->foto.
        microtime()).'.'.$this->foto->extension();
        $this->foto->storeAs('public/fotoprofil', $imageName);
    
        UserProfile::where('user', Auth::user()->uuid)
        ->update([
            'email' => $this->email,
            'nama' => $this->nama,
            'jenis_kelamin' => $this->jenis_kelamin,
            'tgl_lahir' => $this->tgl_lahir,
            'tempat_lahir' => $this->tempat_lahir,
            'alamat_tinggal' => $this->alamat_tinggal,
            'alamat_domisili' => $this->alamat_domisili,
            'foto'=> $this->foto = $imageName
        ]);
    }

        LogActivity::create([
            'actor' => Auth::user()->uuid,
            'action' => 'update',
            'at' => 'siswas'
        ]);

        $this->emit('updateProfilSiswa');
        $this->dispatchBrowserEvent('update-alert');
    }
}
