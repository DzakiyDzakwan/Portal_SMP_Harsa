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

        $start = date("Y-m-d H:i:s", strtotime($this->tanggal_mulai));
        $end = date("Y-m-d H:i:s", strtotime($this->tanggal_berakhir));
        
        DB::select('CALL add_sesi(?, ?, ?, ?, ?, ?)', [ $this->nama_sesi, $this->tahun_ajaran_aktif, $this->semester_aktif, $start, $end, auth()->user()->uuid]);

        $this->tanggal_mulai = null;
        $this->tanggal_berakhir = null;
        $this->emit('sesiStore');
        $this->dispatchBrowserEvent('close-create-modal');
        $this->dispatchBrowserEvent('insert-alert');
    }

    public function render()
    {
        $data = DB::table('list_tahun_ajaran')->whereRaw('status = "aktif" COLLATE utf8mb4_general_ci')->first();
        $this->tahun_ajaran_aktif = $data->tahun_ajaran;
        $this->semester_aktif = $data->semester;
        return view('livewire.sekolah.manajemen-nilai.create-modal-sesi-penilaian');
    }
}
