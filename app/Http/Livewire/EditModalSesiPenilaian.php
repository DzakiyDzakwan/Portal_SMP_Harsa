<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\LogActivity;
use App\Models\SesiPenilaian;

class EditModalSesiPenilaian extends Component
{
    public  $nama_sesi, $tahun_ajaran_aktif, $semester_aktif, $tanggal_mulai, $tanggal_berakhir;

    protected $rules = [
        'sesi_id' => 'required',
        'nama_sesi' => 'required',
        'tahun_ajaran_aktif' => 'required',
        'semester_aktif' => 'required',
        'tanggal_mulai' => 'required',
        'tanggal_berakhir' => 'required'
    ];

    protected $listeners = [
        'editUser' => 'showModal'
    ];

    public function showModal($id)
    {
        //dd($id);
        $data =  SesiPenilaian::where('sesi_id', $id)->first();
        $this->sesi_id = $id;
        $this->nama_sesi = $data->nama_sesi;
        $this->tahun_ajaran_aktif = $data->tahun_ajaran_aktif;
        $this->semester_aktif = $data->semester_aktif;
        $this->tanggal_mulai = $data->tanggal_mulai;
        $this->tanggal_berakhir = $data->tanggal_berakhir;
        $this->dispatchBrowserEvent('edit-modal');
        // dd($id);

    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function render()
    {
        return view('livewire.sekolah.manajemen-nilai.edit-modal-sesi-penilaian');
    }

    public function update()
    {
        $this->validate([
            'sesi_id' => 'required',
            'nama_sesi' => 'required',
            'tahun_ajaran_aktif' => 'required',
            'semester_aktif' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_berakhir' => 'required'
        ]);

        SesiPenilaian::where('sesi_id', $this->sesi_id)->update([
            'nama_sesi' => $this->nama_sesi,
            'tahun_ajaran_aktif' => $this->tahun_ajaran_aktif,
            'semester_aktif' => $this->semester_aktif,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_berakhir' => $this->tanggal_berakhir
        ]);

        LogActivity::create([
            'actor' => auth()->user()->uuid,
            'action' => 'update',
            'at' => 'sesi_penialaians'
        ]);

        $this->emit('sesiUpdate');
        $this->dispatchBrowserEvent('edit-modal');
        $this->dispatchBrowserEvent('update-alert');
    }
}
