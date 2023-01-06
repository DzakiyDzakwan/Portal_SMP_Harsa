<?php

namespace App\Http\Livewire;

use App\Http\Controllers\guru\WaliKelasController;
use App\Models\Guru;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CreateModalWaliKelas extends Component
{
    public  $guru, $role_id, $model_type, $uuid, $model_id;

    public function store()
    {
        // Rol::create([
        //     'mapel' => $this->mapel,
        //     'guru' => $this->guru
        // ]);

        // LogActivity::create([
        //     'actor' => auth()->user()->uuid,
        //     'action' => 'insert',
        //     'at' => 'mapel'
        // ]);
        DB::select('CALL add_walikelas(?, ?)', [$this->model_id, auth()->user()->uuid]);
        $this->reset();
        $this->emit('storeWaliKelas');
        $this->dispatchBrowserEvent('insert-alert');
        $this->dispatchBrowserEvent('close-create-modal');
    }

    public function render()
    {

        //$this->listGurus = DB::table('list_assign_wali')->get();
        $this->guru = User::role(['2', '3', '4'])->distinct()->select('model_has_roles.model_id', 'gurus.user', 'gurus.NUPTK', 'gurus.jabatan', 'gurus.status', 'user_profiles.nama')
            ->join('gurus', 'gurus.user', '=', 'users.uuid')
            ->join('user_profiles', 'users.uuid', '=', 'user_profiles.user')
            ->rightJoin('model_has_roles', 'model_has_roles.model_id', '=', 'user_profiles.user')
            ->get();

        //$listGuru = Guru::select('gurus.NUPTK', 'user_profiles.nama', 'user_profiles.user')->join('users', 'gurus.user', '=', 'users.uuid')->join('user_profiles', 'users.uuid', '=', 'user_profiles.user')->where('status', 'aktif')->where('jabatan', '<>', 'ks')->where('jabatan', '<>', 'tu')->get();
        //dd($listGurus);
        return view('livewire.sekolah.manajemen-kelas.wali-kelas.create-modal-wali-kelas');
    }

    // public function render()
    // {
    //     $guru = Guru::select('gurus.NUPTK', 'user_profiles.nama')
    //         ->join('users', 'gurus.user', '=', 'users.uuid')
    //         ->join('user_profiles', 'users.uuid', '=', 'user_profiles.user')
    //         ->join('model_has_roles', 'model_has_roles.model_id', '=', 'user_profiles.user')
    //         ->where('model_has_roles.role_id', '=', '4', 'AND', 'model_has_roles.role_id', '!=', '7')
    //         ->get();
    //     $ekstrakurikuler = DB::table('ekstrakurikulers')->select('ekstrakurikuler_id', 'nama', 'penanggung_jawab')
    //         // ->where('penanggung_jawab', '=', NULL)
    //         ->get();
    //     // dd($ekstrakurikuler);
    //     // dd($guru, $ekstrakurikuler);
    //     return view('livewire.create-modal-pembina-ekskul', compact('guru', 'ekstrakurikuler'));
    // }

}
