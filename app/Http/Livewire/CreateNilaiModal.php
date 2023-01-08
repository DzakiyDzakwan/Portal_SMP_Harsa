<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Nilai;
use App\Models\KontrakSemester;
use Illuminate\Support\Facades\DB;

class CreateNilaiModal extends Component
{

    public $siswa, $mapel, $kontrak_id, $nama_sesi ,$sesi, $sesi_id, $nilai_p, $nilai_k, $deskripsi_p, $deskripsi_k, $nilai;

    public $mode = "create";

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
        return view('livewire.create-nilai-modal');
    }

    public function showModal($id) {
        $this->kontrak_id = $id;
        $this->siswa = DB::table('list_siswa_kelas')->where('kontrak_semester_id', $id)->first()->nama;
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

        $nilai = Nilai::where('kontrak_siswa', $id)->where('mapel', $this->mapel)->where('sesi', $this->sesi_id)->first();
        if($nilai != null) {
            $this->mode = "update";
            $this->nilai = $nilai->nilai_id;
            $this->nilai_p = $nilai->nilai_pengetahuan;
            $this->nilai_k = $nilai->nilai_keterampilan;
            $this->deskripsi_p = $nilai->deskripsi_pengetahuan;
            $this->deskripsi_k = $nilai->deskripsi_keterampilan;
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
        if ($this->mode === 'create') {
            try {
                DB::select('CALL add_nilai(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$this->sesi_id, $this->sesi, $this->mapel, auth()->user()->gurus->NUPTK, $this->kontrak_id, $this->nilai_p, $this->deskripsi_p, $this->nilai_k, $this->deskripsi_k, auth()->user()->uuid]);
                $this->reset();
                $this->emit('store-nilai');
                $this->dispatchBrowserEvent('insert-alert');
                $this->dispatchBrowserEvent('nilai-modal');
            } catch (\Throwable $th) {
                dd($th);
            }
        } else {
            try {
                DB::select('CALL update_nilai(?, ?, ?, ?, ?, ?, ?)', [$this->nilai, $this->sesi_id, $this->nilai_p, $this->deskripsi_p, $this->nilai_k, $this->deskripsi_k, auth()->user()->uuid]);
                $this->reset();
                $this->emit('store-nilai');
                $this->dispatchBrowserEvent('update-alert');
                $this->dispatchBrowserEvent('nilai-modal');
            } catch (\Throwable $th) {
                dd($th);
            }
        }
        
    }
}
