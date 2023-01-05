<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\TahunAjaran;

class CreateModalKelasAktif extends Component
{
    public $gurus, $tak, $kelas, $kelas_aktif_id, $tahunAktif, $semesterAktif, $wali_kelas, $nama_kelas;

    protected $rules = [
        'kelas_aktif_id' => 'required|max:6|unique:kelas',
    ];

    // protected $listeners = [
    //     'deleteKelas' => 'render'
    // ];

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
        $data = DB::table('list_tahun_ajaran')->whereRaw('status = "aktif" COLLATE utf8mb4_general_ci')->first();
        $this->tahunAktif = $data->tahun_ajaran;
        $this->semesterAktif = $data->semester;
        $this->kelas = DB::table('list_kelas')
        ->get();
        return view('livewire.sekolah.manajemen-kelas.kelas-aktif.create-modal-kelas-aktif');
    }


    public function store() {
        $this->validate([
            'kelas_aktif_id' => 'required|max:6|unique:kelas_aktifs',
            'wali_kelas' => 'required',
            'tahun_ajaran_aktif'=>'required',
            'nama_kelas_aktif' => 'required|unique:kelas_aktifs'
        ]);

        DB::select('CALL add_kelasAktif(?, ?, ?, ?, ?)', [$this->kelas_aktif_id, $this->wali_kelas, $this->tahunAktif, $this->nama_kelas, auth()->user()->uuid]);

        $this->reset();
        $this->emit('storeKelasAktif');
        $this->dispatchBrowserEvent('insert-alert');
        $this->dispatchBrowserEvent('close-create-modal');
        // session()->flash('message', 'Kelas Berhasil dibuat');
    }
    
}
