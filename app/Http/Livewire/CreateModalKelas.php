<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Guru;
use App\Models\Kelas;

class CreateModalKelas extends Component
{
    public $gurus, $kelas_id, $grade, $nama_kelas, $kelompok_kelas, $wali_kelas, $uuid;

    protected $rules = [
        'kelas_id' => 'required|max:3|unique:kelas',
        'nama_kelas' => 'required|unique:kelas',
        'kelompok_kelas' => 'required|min:1',
        'wali_kelas' => 'required'
    ];

    protected $listeners = [
        'inactiveKelas' => 'render'
    ];

    public function updated($fields) {
        $this->validateOnly($fields);
    }

    public function mount() {
        // if(Guru::where('is_wali_kelas', 'tidak')->first() != null) {
        //     $this->wali_kelas = Guru::where('is_wali_kelas', 'tidak')->first()->NIP;
        // }
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
            'kelas_id' => 'required|max:3|unique:kelas',
            'nama_kelas' => 'required|unique:kelas',
            'kelompok_kelas' => 'required|min:1'
        ]);

        $this->uuid = Guru::select('gurus.user')
        ->where('gurus.NUPTK', $this->wali_kelas)
        ->first();

        DB::select('CALL add_kelas(?, ?, ?, ?, ?, ?, ?)', [$this->kelas_id, $this->nama_kelas, $this->grade, $this->kelompok_kelas, $this->wali_kelas, $this->uuid, auth()->user()->uuid]);

        $this->reset();
        $this->emit('storeKelas');
        $this->dispatchBrowserEvent('close-create-modal');
        $this->dispatchBrowserEvent('insert-alert');
        // session()->flash('message', 'Kelas Berhasil dibuat');
    }
    
}
