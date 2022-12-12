<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Siswa;
use App\Models\User;

class SiswaWaliKelas extends Component
{
    public $siswa, $kelas;

    public function render()
    {
        $this->siswa = Siswa::select('siswas.NISN', 'user_profiles.nama', 'kontrak_semesters.sakit', 'kontrak_semesters.izin', 'kontrak_semesters.alpa')->join('user_profiles', 'user_profiles.user', '=', 'siswas.user')->join('kontrak_semesters', 'kontrak_semesters.siswa', '=', 'siswas.nisn')->where('kelas', $this->kelas)->get();
        /* dd($this->siswa); */
        return view('livewire.siswa-wali-kelas');
    }
    
}
