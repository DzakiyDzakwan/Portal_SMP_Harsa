<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ListSiswa extends Component
{
    public $siswas, $user, $status, $tahun_ajaran_aktif, $semester_aktif;

    protected $listeners = [
        'siswaStore'=> 'render',
        'siswaUpdate'=> 'render',
        'siswaNonaktif' => 'render',
        'siswaDelete' => 'render',
        'filter'
    ];

    public function mount() {
        $data = DB::table('list_tahun_ajaran')->whereRaw('status <> "inaktif" COLLATE utf8mb4_general_ci')->first();
        if($data != null) {
            $this->tahun_ajaran_aktif = $data->tahun_ajaran;
            $this->semester_aktif = $data->semester;
        }
    }

    public function filter($data) {
        $this->tahun_ajaran_aktif = $data["tahun_ajaran_aktif"];
        $this->semester_aktif = $data["semester_aktif"];
    }

    public function render()
    {
        $this->siswas = User::withTrashed()->select('siswas.user', 'siswas.NISN', 'siswas.tanggal_masuk', 'siswas.status', 'user_profiles.nama', 'kontrak_semesters.kelas', 'kelas.nama_kelas')
        ->join('siswas', 'siswas.user', '=', 'users.uuid')
        ->join('user_profiles', 'users.uuid', '=', 'user_profiles.user')
        ->join('kontrak_semesters', 'kontrak_semesters.siswa', '=', 'siswas.NISN')
        ->join('kelas', 'kelas.kelas_id', '=', 'kontrak_semesters.kelas')->where('kontrak_semesters.tahun_ajaran_aktif', $this->tahun_ajaran_aktif)->where('kontrak_semesters.semester_aktif', $this->semester_aktif)
        ->orderBy('siswas.created_at', 'DESC')
        ->get();

        return view('livewire.user.manajemen-akun.siswa.list-siswa');
    }

    public function editSiswa($id) {
        $this->emit('editUser', $id);
    }

    public function infoSiswa($id) {
        $this->emit('infoSiswa', $id);
    }

    public function inactive($user) {

        DB::select('CALL inactive_siswa(?, ?, ?)', [$user, $this->status, auth()->user()->uuid]);

        $this->render();
        $this->emit('siswaNonaktif');
        $this->dispatchBrowserEvent('inactive-alert');
    }

    /* public function delete($user) {

        DB::select('CALL delete_siswa(?, ?)', [$user, auth()->user()->uuid]);

        $this->render();
        $this->emit('siswaDelete');
        $this->dispatchBrowserEvent('delete-alert');
    } */
    
}
