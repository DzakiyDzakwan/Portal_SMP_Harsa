<?php

namespace App\Http\Livewire;

use App\Models\Guru;
use App\Models\LogActivity;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Exists;
use Livewire\Component;
use Livewire\Event;
use Livewire\WithFileUploads;


class EditProfileGuru extends Component
{
    use WithFileUploads;
    public $event, $data, $foto, $nama, $kelas, $email, $jenis_kelamin, $tgl_lahir, $tempat_lahir, $alamat_tinggal, $alamat_domisili, $pendidikan, $tahun_ijazah, $status_perkawinan, $tanggal_masuk;
    protected $listeners = [
        'editProfileGuru'=> 'render'
    ];
    public function render()
    {
        $data = Guru::join('users', 'gurus.user', '=', 'users.uuid')
        ->join('user_profiles', 'user_profiles.user', '=', 'users.uuid')
        ->where('gurus.user', Auth::user()->uuid)->first();

        $this->nama = $data->nama;
        $this->email = $data->email;
        $this->jenis_kelamin = $data->jenis_kelamin;
        $this->tgl_lahir = $data->tgl_lahir;
        $this->tempat_lahir = $data->tempat_lahir;
        $this->alamat_tinggal = $data->alamat_tinggal;
        $this->alamat_domisili = $data->alamat_domisili;
        $this->pendidikan = $data->pendidikan;
        $this->tahun_ijazah = $data->tahun_ijazah;
        $this->status_perkawinan = $data->status_perkawinan;
        $this->tanggal_masuk = $data->tanggal_masuk;
        return view('livewire.edit-profile-guru');
    }

    public function update()
    {
        $rules = [
            'email' => 'required|email',
            'nama' => 'required|max:100',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required|max:255',
            'pendidikan' => 'required',
            'tahun_ijazah' => 'required',
            'tanggal_masuk' => 'required',
            'foto' => 'nullable|file'
        ];

        $this->validate($rules);

        Guru::where('user', Auth::user()->uuid)->update([
            'pendidikan' => $this->pendidikan,
            'tahun_ijazah' => $this->tahun_ijazah,
            'status_perkawinan' => $this->status_perkawinan,
            'tanggal_masuk' => $this->tanggal_masuk
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
            'at' => 'gurus'
        ]);

        $this->emit('updateProfilGuru');
        $this->dispatchBrowserEvent('update-alert');
    }
}
