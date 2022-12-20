<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Nilai;

class CreateNilaiModal extends Component
{

    public $mapel, $kontrak, $sesi, $sesi_id, $kkm, $nilai_p, $nilai_k, $deskripsi_p, $deskripsi_k;

    public function mount($mapel) {
        $this->mapel = $mapel;
    }

    protected $listeners = [
        'showModal'
    ];

    public function render()
    {
        $cekSesi = DB::table("list_sesi_penilaian")->where('status', "Aktif")->get();
        if($cekSesi->isEmpty()) {
            $this->sesi = "Tidak ada sesi yang tersedia";
        } else {
            $sesiAktif = DB::table("list_sesi_penilaian")->where('status', "Aktif")->first();
            $this->sesi = $sesiAktif->nama_sesi;
            $this->sesi_id = $sesiAktif->sesi_id;
        }
        $nilai = Nilai::where('kontrak_siswa', $this->kontrak)->get();
        return view('livewire.create-nilai-modal', compact('nilai'));
    }

    public function showModal($id) {
        $this->kontrak = $id;
        $this->dispatchBrowserEvent('nilai-modal');
    }

    public function store() {
        try {
            DB::select('CALL add_nilai(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$this->sesi_id, $this->mapel, auth()->user()->gurus->NIP, $this->kontrak, $this->kkm, $this->nilai_p, $this->deskripsi_p, $this->nilai_k, $this->deskripsi_k, auth()->user()->uuid]);
            $this->reset();
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
