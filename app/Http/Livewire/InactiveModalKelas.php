<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kelas;
use App\Models\Guru;

class InactiveModalKelas extends Component
{

    public $kelas_id, $wali_kelas, $gurus;

    protected $listeners = [
        'getRestoreModal',
        'getDeleteModal'
    ];

    public function mount() {
        if(Guru::where('is_wali_kelas', 'tidak')->first() != null) {
            $this->wali_kelas = Guru::where('is_wali_kelas', 'tidak')->first()->NIP;
        }
    }

    public function render()
    {
        $this->gurus = Guru::select('gurus.NIP', 'user_profiles.nama')->join('users', 'gurus.user', '=', 'users.uuid')->join('user_profiles', 'users.uuid', '=', 'user_profiles.user')->where('is_wali_kelas', 'tidak')->get();
        return view('admin.components.livewire.inactive-modal-kelas');
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
        Kelas::where('kelas_id', $this->kelas_id)->restore();
        Kelas::where('kelas_id', $this->kelas_id)->update([
            'wali_kelas' => $this->wali_kelas,
        ]);
        $this->closeRestoreModal();
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
