<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kelas;
use App\Models\Guru;
use Illuminate\Support\Facades\DB;

class InactiveModalKelas extends Component
{

    public $kelas_id, $wali_kelas, $gurus;

    protected $listeners = [
        'getRestoreModal',
        'getDeleteModal'
    ];

    // public function mount() {
    //     if(Guru::where('is_wali_kelas', 'tidak')->first() != null) {
    //         $this->wali_kelas = Guru::where('is_wali_kelas', 'tidak')->first()->NIP;
    //     }
    // }

    public function render()
    {
        $this->gurus = Guru::select('gurus.NUPTK', 'user_profiles.nama')->join('users', 'gurus.user', '=', 'users.uuid')->join('user_profiles', 'users.uuid', '=', 'user_profiles.user')->get();
        return view('livewire.sekolah.manajemen-kelas.kelas.inactive-modal-kelas');
    }

    public function inactiveModal() {
        $this->dispatchBrowserEvent('inactive-modal');
    }

    public function RestoreModal() {
        $this->dispatchBrowserEvent('restore-modal');
    }

    public function getRestoreModal($id) {
        $this->kelas_id = $id;
        $this->inactiveModal();
        $this->restoreModal();
    }

    public function closeRestoreModal() {
        $this->restoreModal();
        $this->inactiveModal();
    }

    public function restoreUser() {
        DB::select('CALL restore_kelas(?, ?, ?)', [$this->kelas_id, $this->wali_kelas, auth()->user()->uuid]);
        // $this->dispatchBrowserEvent('restore-alert');
        // $this->closeRestoreModal();
        $this->dispatchBrowserEvent('restore-alert');
        $this->emit('restoreKelas');
    }

    public function deleteModal() {
        $this->dispatchBrowserEvent('delete-modal');
    }

    public function getDeleteModal($id) {
        $this->kelas_id = $id;
        $this->inactiveModal();
        $this->deleteModal();
    }

    public function closeDeleteModal() {
        $this->deleteModal();
        $this->inactiveModal();
    }

    public function deleteUser() {
        Kelas::where('kelas_id', $this->kelas_id)->forceDelete();
        $this->closeDeleteModal();
        $this->dispatchBrowserEvent('delete-alert');
        $this->emit('deleteKelas');
    }
}
