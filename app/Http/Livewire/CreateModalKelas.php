<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Guru;
use App\Models\Kelas;

class CreateModalKelas extends Component
{
    public $gurus, $grade, $nama_kelas, $kelompok_kelas;

    protected $rules = [
        'nama_kelas' => 'required|unique:kelas',
        'kelompok_kelas' => 'required|min:1',
    ];

    protected $listeners = [
        'deleteKelas' => 'render'
    ];

    public function updated($fields) {
        $this->validateOnly($fields);
    }

    public function mount() {
        $this->grade = "7";
    }

    
    public function render()
    {
        $this->gurus = Guru::select('gurus.NUPTK', 'user_profiles.nama')
        ->join('users', 'gurus.user', '=', 'users.uuid')
        ->join('user_profiles', 'users.uuid', '=', 'user_profiles.user')
        ->where('gurus.jabatan', 'guru')
        ->get();
        return view('livewire.sekolah.manajemen-kelas.kelas.create-modal-kelas');
    }


    public function store() {
        $this->validate([
            'nama_kelas' => 'required|unique:kelas',
            'kelompok_kelas' => 'required|min:1'
        ]);

        DB::select('CALL add_kelas(?, ?, ?, ?)', [$this->nama_kelas, $this->grade, $this->kelompok_kelas, auth()->user()->uuid]);

        $this->reset();
        $this->emit('storeKelas');
        $this->dispatchBrowserEvent('insert-alert');
        $this->dispatchBrowserEvent('close-create-modal');
    }
    
}
