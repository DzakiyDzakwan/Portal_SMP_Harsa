<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\LogActivity;
use App\Models\SesiPenilaian;
use Illuminate\Support\Facades\DB;

class CreateModalSesiPenilaian extends Component
{
    public $sesi_id, $nama_sesi, $tahun_ajaran_aktif, $semester_aktif, $tanggal_mulai, $tanggal_berakhir;

    // protected $rules = [
    //     'sesi_id' => 'required',
    //     'nama_sesi' => 'required',
    //     'tahun_ajaran_aktif' => 'required',
    //     'semester_aktif' => 'required',
    //     'tanggal_mulai' => 'required',
    //     'tanggal_berakhir' => 'required'
    // ];

    public function store()
    {
        // $this->validate([
        //     'sesi_id' => 'required',
        //     'nama_sesi' => 'required',
        //     'tahun_ajaran_aktif' => 'required',
        //     'semester_aktif' => 'required',
        //     'tanggal_mulai' => 'required',
        //     'tanggal_berakhir' => 'required'
        // ]);

        SesiPenilaian::create([
            'nama_sesi' => $this->nama_sesi,
            'tahun_ajaran_aktif' => $this->tahun_ajaran_aktif,
            'semester_aktif' => $this->semester_aktif,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_berakhir' => $this->tanggal_berakhir
        ]);

        LogActivity::create([
            'actor' => auth()->user()->uuid,
            'action' => 'insert',
            'at' => 'sesi_penilaians'
        ]);

        //DB::select('CALL add_sesi(?, ?, ?, ?, ?, ?, ?)', [$this->sesi_id, $this->nama_sesi, $this->tahun_ajaran_aktif, $this->semester_aktif, $this->tanggal_mulai, $this->tanggal_berakhir, auth()->user()->uuid]);

        $this->reset();
        $this->emit('sesiStore');
        $this->dispatchBrowserEvent('close-create-modal');
        $this->dispatchBrowserEvent('insert-alert');
    }

    public function render()
    {
        return view('livewire.sekolah.manajemen-nilai.create-modal-sesi-penilaian');
    }
}
