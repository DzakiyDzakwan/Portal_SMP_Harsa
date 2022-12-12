<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Kelas;

class CreateModalSiswa extends Component
{
    public $kelas, $password, $nama, $nisn, $nis, $tanggal_masuk, $kelas_id, $jenis_kelamin;

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'nisn' => 'required|max:10',
            'nis' => 'required|max:4',
            'tanggal_masuk' => 'required',
        ]);

        $this->password = Hash::make($this->nis);

        DB::select('CALL add_siswa(?, ?, ?, ?, ?, ?, ?, ?)', [$this->nama, $this->nisn, $this->nis, $this->password, $this->tanggal_masuk, $this->kelas_id, $this->jenis_kelamin, auth()->user()->uuid]);

        $this->reset();
        $this->emit('siswaStore');
        $this->dispatchBrowserEvent('insert-alert');
        $this->dispatchBrowserEvent('close-create-modal');
    }

    public function render()
    {
        $this->kelas = DB::table('kelas')->get();
        return view('admin.components.livewire.create-modal-siswa');
    }
}
