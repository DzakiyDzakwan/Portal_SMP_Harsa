<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\LogActivity;
use Illuminate\Support\Facades\DB;

class ListGuru extends Component
{
    public $gurus;

    protected $listeners = [
        'storeGuru' => 'render',
        'updateGuru' => 'render'
    ];

    public function render()
    {
        $this->gurus = DB::table('list_guru_active')
        ->get();
        return view('livewire.user.manajemen-akun.guru.list-guru');
    }

    public function inactiveGuru($user) {
        $guru = Guru::where('user', $user)->first()->NUPTK;
        DB::select('CALL inactive_guru(?, ?)', [$user, auth()->user()->uuid]);
        $this->dispatchBrowserEvent('inactive-alert');
        // if(Kelas::where('wali_kelas', $guru)->get()->isEmpty()){
            
        //     $this->render();
        //     $this->emit('inactiveGuru');
           
        // } else {
        //     $this->dispatchBrowserEvent('nonInactive-alert');
        // }
    }

    public function infoGuru($id) {
        $this->emit('infoGuru', $id);
    }

    public function editGuru($id) {
        $this->emit('editGuru', $id);
    }

    public function restoreGuru($id) {
        $guru = Guru::where('user', $id)->first()->NUPTK;
        DB::select('CALL restore_guru(?, ?)', [$id, auth()->user()->uuid]);
        $this->dispatchBrowserEvent('restore-alert');
    }

    public function deleteGuru($id) {
        Guru::where('user', $id)->delete();

        LogActivity::create([
            'actor' => auth()->user()->uuid,
            'action' => 'delete',
            'at' => 'gurus'
        ]);

        UserProfile::where('user', $id)->delete();

        LogActivity::create([
            'actor' => auth()->user()->uuid,
            'action' => 'delete',
            'at' => 'user_profiles'
        ]);

        User::where('uuid', $id)->forceDelete();

        LogActivity::create([
            'actor' => auth()->user()->uuid,
            'action' => 'delete',
            'at' => 'users'
        ]);

        $this->render();
        $this->emit('deleteGuru');
        $this->dispatchBrowserEvent('delete-modal');
        $this->dispatchBrowserEvent('delete-alert');
    }
}
