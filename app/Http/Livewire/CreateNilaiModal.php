<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Nilai;
use App\Models\KontrakSemester;
use Illuminate\Support\Facades\DB;

class CreateNilaiModal extends Component
{

    public $nilai, $mapel, $kontrak_id, $nama_sesi ,$sesi, $sesi_id, $nilai_p, $nilai_k, $deskripsi_p, $deskripsi_k;

    /* protected $rules = [
        'sesi' => 'required',
        'kkm' => 'required',
        'nilai_p' => 'required',
        'deskripsi_p' => 'required',
        'nilai_k' => 'required',
        'deskripsi_k' => 'required'
    ];

    public function updated($fields) {
        $this->validateOnly($fields);
    } */

    public function mount($mapel) {
        $this->mapel = $mapel;
    }

    protected $listeners = [
        'showModal'
    ];

    public function render()
    {
        
        $nilai = Nilai::where('kontrak_siswa', 2)->get();
        return view('livewire.create-nilai-modal');
    }

    public function showModal($id) {
        $this->kontrak_id = $id;
        $sesiPenilaian = DB::table("list_sesi_penilaian")->whereRaw('status = "aktif" COLLATE utf8mb4_general_ci')->first();

        if($sesiPenilaian == null) {
            $this->nama_sesi = "Tidak ada sesi yang tersedia";
        } else {
            $this->sesi = $sesiPenilaian->nama_sesi;
            if($sesiPenilaian->nama_sesi === "uh1") {
                $this->nama_sesi = "Ulangan Harian 1";
            } elseif($sesiPenilaian->nama_sesi === "uh2") {
                $this->nama_sesi = "Ulangan Harian 2";
            }elseif($sesiPenilaian->nama_sesi === "uh3") {
                $this->nama_sesi = "Ulangan Harian 3";
            }elseif($sesiPenilaian->nama_sesi === "uts") {
                $this->nama_sesi = "Ujian Tengah Semester";
            } else {
                $this->nama_sesi = "Ujian Akhir Semester";
            }
            $this->sesi_id = $sesiPenilaian->id;
        }
        $this->dispatchBrowserEvent('nilai-modal');
    }

    public function store() {
        /* $this->validate([
            'sesi' => 'required',
            'kkm' => 'required',
            'nilai_p' => 'required',
            'deskripsi_p' => 'required',
            'nilai_k' => 'required',
            'deskripsi_k' => 'required'
        ]); */
        try {
            DB::select('CALL add_nilai(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$this->sesi_id, $this->sesi, $this->mapel, auth()->user()->gurus->NUPTK, $this->kontrak_id, $this->nilai_p, $this->deskripsi_p, $this->nilai_k, $this->deskripsi_k, auth()->user()->uuid]);
            $this->reset();
            $this->dispatchBrowserEvent('insert-alert');
            $this->dispatchBrowserEvent('nilai-modal');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
