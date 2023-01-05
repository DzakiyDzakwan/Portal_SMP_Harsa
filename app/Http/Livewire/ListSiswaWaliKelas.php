<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Siswa;
use App\Models\User;
use App\Models\KontrakSemester;

class ListSiswaWaliKelas extends Component
{
    public $siswa, $kelas;

    public function render()
    {
        $this->siswa = Siswa::select('siswas.NISN', 'siswas.user', 'user_profiles.nama', 'kontrak_semesters.sakit', 'kontrak_semesters.izin', 'kontrak_semesters.alpa')->join('user_profiles', 'user_profiles.user', '=', 'siswas.user')->join('kontrak_semesters', 'kontrak_semesters.siswa', '=', 'siswas.nisn')->where('kelas', $this->kelas)->where('siswas.status', 'Aktif')->get();
        /* dd($this->siswa); */
        return view('livewire.list-siswa-wali-kelas');
    }

    public function infoSiswa($id) {
        $this->emit('infoSiswa', $id);
    }

    public function createPrestasi($id) {
        $this->emit('createPrestasi', $id);
    }

    public function sakitIncrease($id) {
        /* dd($id); */
        $sakit = KontrakSemester::select('sakit')->where('siswa', $id)->where('status', 'ongoing')->first()->sakit;
        $sakit++;
        $kontrak = KontrakSemester::select('sakit')->where('siswa', $id)->where('status', 'ongoing');
        $kontrak->update([
            'sakit' => $sakit
        ]);
        $this->render();
    }

    public function sakitDecrease($id) {
        $sakit = KontrakSemester::select('sakit')->where('siswa', $id)->where('status', 'ongoing')->first()->sakit;
        if($sakit == 0) {
            return;
        } else {
            $sakit--;
            $kontrak = KontrakSemester::select('sakit')->where('siswa', $id)->where('status', 'ongoing');
            $kontrak->update([
                'sakit' => $sakit
            ]);
            $this->render();
        }
    }

    public function izinIncrease($id) {
        $izin = KontrakSemester::select('izin')->where('siswa', $id)->where('status', 'ongoing')->first()->izin;
        $izin++;
        $kontrak = KontrakSemester::select('izin')->where('siswa', $id)->where('status', 'ongoing');
        $kontrak->update([
            'izin' => $izin
        ]);
        $this->render();
    }

    public function izinDecrease($id) {
        $izin = KontrakSemester::select('izin')->where('siswa', $id)->where('status', 'ongoing')->first()->izin;
        if($izin == 0) {
            return;
        } else {
            $izin--;
            $kontrak = KontrakSemester::select('izin')->where('siswa', $id)->where('status', 'ongoing');
            $kontrak->update([
                'izin' => $izin
            ]);
            $this->render();
        }
    }

    public function alpaIncrease($id) {
        $alpa = KontrakSemester::select('alpa')->where('siswa', $id)->where('status', 'ongoing')->first()->alpa;
        $alpa++;
        $kontrak = KontrakSemester::select('alpa')->where('siswa', $id)->where('status', 'ongoing');
        $kontrak->update([
            'alpa' => $alpa
        ]);
        $this->render();
    }

    public function alpaDecrease($id) {
        $alpa = KontrakSemester::select('alpa')->where('siswa', $id)->where('status', 'ongoing')->first()->alpa;
        if($alpa == 0) {
            return;
        } else {
            $alpa--;
            $kontrak = KontrakSemester::select('alpa')->where('siswa', $id)->where('status', 'ongoing');
            $kontrak->update([
                'alpa' => $alpa
            ]);
            $this->render();
        }
    }
    
}
