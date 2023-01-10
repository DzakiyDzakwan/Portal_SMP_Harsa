<?php

namespace App\Http\Livewire;

use App\Models\EkstrakurikulerSiswa;
use App\Models\Nilai;
use Livewire\Component;
use App\Models\LogActivity;
use Illuminate\Support\Facades\DB;
use App\Models\NilaiEkstrakurikuler;

class CreateModalNilaiEkskul extends Component
{
    public $siswa, $kontrak_id, $nama_sesi, $sesi, $sesi_id, $ekstrakurikuler, $nilai, $nilai_e, $keterangan_e, $kontrak_siswa;

    public $mode = "create";

    // public function mount($eksul)
    // {
    //     $this->mapel = $mapel;
    // }

    protected $listeners = [
        'showModal'
    ];

    protected $rules = [
        'ekstrakurikuler' => 'required',
        'nilai' => 'required',
        'nilai_e' => 'required',
        'keterangan_e' => 'required'
    ];

    public function showModal($id)
    {
        //dd($id);
        $this->kontrak_id = $id;
        $this->siswa = DB::table('list_ekstrakurikuler_siswa')->where('kontrak_semester_id', $id)->first()->nama_siswa;
        $sesiPenilaian = DB::table("list_sesi_penilaian")->whereRaw('status = "aktif" COLLATE utf8mb4_general_ci')->first();

        if ($sesiPenilaian == null) {
            $this->nama_sesi = "Tidak ada sesi yang tersedia";
        } else {
            $this->sesi = $sesiPenilaian->nama_sesi;
            if ($sesiPenilaian->nama_sesi === "Ujian Akhir Semester") {
                $this->nama_sesi = "Ulangan Harian 1";
            }
            $this->sesi_id = $sesiPenilaian->id;
        }

        $nilai = NilaiEkstrakurikuler::where('kontrak_siswa', $id)->where('ekstrakurikuler', $this->ekstrakurikuler)->where('sesi', $this->sesi_id)->first();
        if ($nilai != null) {
            $this->mode = "update";
            $this->nilai = $nilai->nilai_id;
            $this->nilai_e = $nilai->nilai;
            $this->keterangan_e = $nilai->keterangan;
        }

        $this->dispatchBrowserEvent('nilai-modal');
    }

    public function store()
    {
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
                NilaiEkstrakurikuler::create([
                    'ekstrakurikuler' => $this->ekstrakurikuler,
                    'kontrak_siswa' => $this->kontrak_siswa,
                    'sesi' => $this->sesi,
                    'nilai' => $this->nilai_e,
                    'keterangan' => $this->keterangan_e
                ]);

                LogActivity::create([
                    'actor' => auth()->user()->uuid,
                    'action' => 'insert',
                    'at' => 'nilai-ekskul'
                ]);
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

    public function render()
    {
        return view('livewire.sekolah.manajemen-ekstrakurikuler.create-modal-nilai-ekskul');
    }
}
