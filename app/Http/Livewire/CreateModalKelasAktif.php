<?php

namespace App\Http\Livewire;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\KelasAktif;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateModalKelasAktif extends Component
{
    public $gurus, $kelasAktif, $kelas_aktif_id, $wali_kelas, $tahun_ajaran_aktif, $kelas;
    protected $rules = [
        'kelas' => 'required',
        'wali_kelas' => 'required'
    ];
    public function render()
    {
        $this->gurus = Guru::select('gurus.NUPTK', 'user_profiles.nama')
        ->join('users', 'gurus.user', '=', 'users.uuid')
        ->join('user_profiles', 'users.uuid', '=', 'user_profiles.user')
        ->join('model_has_roles', 'model_has_roles.model_id', '=', 'gurus.user')
        ->where('model_has_roles.role_id', '=', "5")
        ->get();
        $data = DB::table('list_tahun_ajaran')->whereRaw('status = "aktif" COLLATE utf8mb4_general_ci')->first();
        $this->tahun_ajaran_aktif = $data->tahun_ajaran;
        $this->kelasAktif = DB::table('list_kelas')
        ->get();
        return view('livewire.sekolah.manajemen-kelas.kelas-aktif.create-modal-kelas-aktif');
    }
    public function store()
    {
        $this->validate([
            'kelas' => 'required',
            'wali_kelas' => 'required'
        ]);
        $nama_kelas = Kelas::select('nama_kelas', 'grade', 'kelompok_kelas')
        ->where('kelas_id', '=', $this->kelas)
        ->first();

        $nama_kelas_aktif = $nama_kelas->nama_kelas;

        DB::select('CALL add_kelasAktif(?, ?, ?, ?, ?, ?)', [$this->kelas_aktif_id, $this->kelas, $this->wali_kelas, $this->tahun_ajaran_aktif, $nama_kelas_aktif, auth()->user()->uuid]);
        
        // KelasAktif::create([
        //     'kelas_aktif_id' => $this->kelas_aktif_id,
        //     'wali_kelas' => $this->wali_kelas,
        //     'tahun_ajaran_aktif' => $this->tahun_ajaran_aktif,
        //     'nama_kelas_aktif' => $this->nama_kelas_aktif
        // ]);

        $this->reset();
        $this->emit('storeKelasAktif');
        $this->dispatchBrowserEvent('insert-alert');
        $this->dispatchBrowserEvent('close-create-modal');
    }
}
