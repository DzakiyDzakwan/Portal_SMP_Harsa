<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Kelas;

class CreateModalSiswa extends Component
{
    public $nama, $nisn, $nis, $tanggal_masuk, $kelas_aktif, $jenis_kelamin, $tahun_ajaran_aktif, $semester_aktif;

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'nisn' => 'required|max:16',
            'nis' => 'required|max:4',
            'tanggal_masuk' => 'required',
        ]);

        $grade = Kelas::select('kelas.grade', 'kelas.kelompok_kelas')
        ->join('kelas_aktifs', 'kelas_aktifs.kelas', '=', 'kelas.kelas_id')
        ->where('kelas_aktifs.kelas_aktif_id', '=', $this->kelas_aktif)
        ->first();

        $g = $grade->grade;
        $k = $grade->kelompok_kelas;
        $kelas_awal = $g.$k;

        $password = Hash::make($this->nis);
        /* DB::select('CALL add_siswa(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$this->nama, $this->nisn, $this->nis, $this->password, $this->kelas_awal, $this->tanggal_masuk, $this->kelas_aktif, $g, $this->tahun_ajaran_aktif, $this->semester_aktif, $this->jenis_kelamin, auth()->user()->uuid]); */

        DB::select('CALL add_siswa(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$this->nama, $this->nisn, $this->nis, $password, $this->tanggal_masuk, $this->tahun_ajaran_aktif, $this->kelas_aktif, $kelas_awal, $this->semester_aktif, $this->jenis_kelamin, auth()->user()->uuid]);

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
        $kelas = DB::table('kelas_aktifs')->where('tahun_ajaran_aktif', $this->tahun_ajaran_aktif)->get();
        return view('livewire.user.manajemen-akun.siswa.create-modal-siswa', compact("kelas"));
    }
}
