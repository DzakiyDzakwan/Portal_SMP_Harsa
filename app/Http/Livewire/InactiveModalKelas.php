<?php

namespace App\Http\Livewire;

use App\Models\Guru;
use App\Models\Mapel;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class InactiveModalKelas extends Component
{
    public $kelas_id, $gurus, $wali_kelas;

    protected $listeners = [
        'getRestoreModal',
        'getDeleteModal'
    ];

    public function mount()
    {
    }

    public function render()
    {
        $this->gurus = Guru::select('gurus.NUPTK', 'user_profiles.nama')
        ->join('users', 'gurus.user', '=', 'users.uuid')
        ->join('user_profiles', 'users.uuid', '=', 'user_profiles.user')
        ->join('model_has_roles', 'model_id', '=', 'gurus.user')
        ->where([
            ['gurus.jabatan', 'guru'],
            ['model_has_roles.role_id', '<>', 5]
        ])
        ->get();
        return view('livewire.sekolah.manajemen-kelas.kelas.inactive-modal-kelas');
    }

    public function inactiveModal()
    {
        $this->dispatchBrowserEvent('inactive-modal');
    }

    public function RestoreModal()
    {
        $this->dispatchBrowserEvent('restore-modal');
    }

    public function getRestoreModal($id)
    {
        $this->kelas_id = $id;
        $this->inactiveModal();
        $this->restoreModal();
    }

    public function closeRestoreModal()
    {
        $this->restoreModal();
        $this->inactiveModal();
    }

    public function restoreUser()
    {
        $guru = Guru::select('gurus.user')
        ->where('gurus.NUPTK', $this->wali_kelas )
        ->first();
        $user = $guru->user;
        DB::select('CALL restore_kelas(?, ?, ?, ?)', [$this->kelas_id, $this->wali_kelas, $user, auth()->user()->uuid]);
        $this->closeRestoreModal();
        $this->dispatchBrowserEvent('restore-alert');
        $this->emit('restoreKelas');
    }

    public function deleteModal()
    {
        $this->dispatchBrowserEvent('delete-modal');
    }

    public function getDeleteModal($id)
    {
        $this->kelas_id = $id;
        $this->inactiveModal();
        $this->deleteModal();
    }

    public function closeDeleteModal()
    {
        $this->deleteModal();
        $this->inactiveModal();
    }

    public function deleteUser()
    {
        DB::select('CALL delete_kelas(?, ?)', [$this->kelas_id, auth()->user()->uuid]);
        //Mapel::where('mapel_id', $this->mapel_id)->forceDelete();
        $this->closeDeleteModal();
        $this->dispatchBrowserEvent('delete-alert');
        $this->emit('deleteMapel');
    }
}

