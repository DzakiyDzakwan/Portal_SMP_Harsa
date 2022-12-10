<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Guru;
use App\Models\User;
use App\Models\Kelas;

class CreateModalKelas extends Component
{
    public $gurus, $kelas_id, $nama_kelas, $kelompok_kelas, $wali_kelas;
    public $grade = '7';

    protected $rules = [
        'kelas_id' => 'required|max:3|unique:kelas',
        'nama_kelas' => 'required|unique:kelas',
        'kelompok_kelas' => 'required|min:1'
    ];

    public function updated($fields) {
        $this->validateOnly($fields);
    }

    public function mount() {
        $this->wali_kelas = Guru::where('is_wali_kelas', 'tidak')->first()->NIP;
    }

    public function store() {

        dd($this);
    }

    public function render()
    {
        $this->gurus = Guru::where('is_wali_kelas', 'tidak')->get();
        return view('admin.components.livewire.create-modal-kelas');
    }

    
}
