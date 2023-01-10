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
    public $siswa, $kontrak, $sesi, $nilai_e, $keterangan_e, $ekstrakurikuler;

    public $mode = "create";

    // public function mount($eksul)
    // {
    //     $this->mapel = $mapel;
    // }

    protected $listeners = [
        'showModal'
    ];

    protected $rules = [
        'nilai_e' => 'required',
        'keterangan_e' => 'required'
    ];

    public function showModal($kontrak)
    {
        $this->kontrak = $kontrak;
        $this->siswa = DB::table('list_ekstrakurikuler_siswa')->where('kontrak_semester_id', $kontrak)->first()->nama_siswa;

        $sesi = DB::table("list_sesi_penilaian")->whereRaw('nama_sesi = "uas" COLLATE utf8mb4_general_ci AND status = "aktif" COLLATE utf8mb4_general_ci')->first();
        if($sesi != null) {
            $this->sesi = $sesi->id;
        }

        $nilai = NilaiEkstrakurikuler::where('kontrak_siswa', $kontrak)->where('ekstrakurikuler', $this->ekstrakurikuler)->where('sesi', $this->sesi)->first();
        if ($nilai != null) {
            $this->mode = "update";
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
                    'kontrak_siswa' => $this->kontrak,
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
        $this->ekstrakurikuler = auth()->user()->gurus->ekstrakurikulers->ekstrakurikuler_id;
        return view('livewire.sekolah.manajemen-ekstrakurikuler.create-modal-nilai-ekskul');
    }
}
