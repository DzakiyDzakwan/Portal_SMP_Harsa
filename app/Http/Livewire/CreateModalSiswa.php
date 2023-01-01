<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Kelas;

class CreateModalSiswa extends Component
{
    public $kelas, $password, $nama, $nisn, $nis, $tanggal_masuk, $kelas_id, $jenis_kelamin, $tahun_ajaran_aktif, $semester_aktif;

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'nisn' => 'required|max:10',
            'nis' => 'required|max:4',
            'tanggal_masuk' => 'required',
        ]);

        $this->password = Hash::make($this->nis);
        DB::select('CALL add_siswa(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$this->nama, $this->nisn, $this->nis, $this->password, $this->tanggal_masuk, $this->kelas_id, $this->tahun_ajaran_aktif, $this->semester_aktif, $this->jenis_kelamin, auth()->user()->uuid]);

        $this->reset();
        $this->emit('siswaStore');
        $this->dispatchBrowserEvent('insert-alert');
        $this->dispatchBrowserEvent('close-create-modal');
    }

    public function render()
    {
        $this->tahun_ajaran_aktif = null;
        $this->semester_aktif = null;
        $data = DB::table('list_tahun_ajaran')->whereRaw('status = "aktif" COLLATE utf8mb4_general_ci')->first();
        if($data != null) {
            $this->tahun_ajaran_aktif = $data->tahun_ajaran;
            $this->semester_aktif = $data->semester;
        }
        $this->kelas = DB::table('kelas')->get();
        return view('livewire.user.manajemen-akun.siswa.create-modal-siswa');
    }
}
