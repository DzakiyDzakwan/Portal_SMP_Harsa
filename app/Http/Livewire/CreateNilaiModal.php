<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Nilai;

class CreateNilaiModal extends Component
{

    public $mapel, $kontrak, $sesi, $sesi_id, $kkm, $nilai_p, $nilai_k, $deskripsi_p, $deskripsi_k;

    protected $rules = [
        'sesi' => 'required',
        'kkm' => 'required',
        'nilai_p' => 'required',
        'deskripsi_p' => 'required',
        'nilai_k' => 'required',
        'deskripsi_k' => 'required'
    ];

    public function updated($fields) {
        $this->validateOnly($fields);
    }

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
        $this->kontrak = $id;
        $cekSesi = DB::table("list_sesi_penilaian")->where('status', "Aktif")->get();
        if($cekSesi->isEmpty()) {
            $this->sesi = "Tidak ada sesi yang tersedia";
        } else {
            $sesiAktif = DB::table("list_sesi_penilaian")->where('status', "Aktif")->first();
            $this->sesi = $sesiAktif->nama_sesi;
            $this->sesi_id = $sesiAktif->sesi_id;
        }
        /* $this->nilai = Nilai::where('kontrak_siswa', $this->kontrak)->get(''); */
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
            DB::select('CALL add_nilai(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$this->sesi_id, $this->sesi, $this->mapel, auth()->user()->gurus->NIP, $this->kontrak, $this->kkm, $this->nilai_p, $this->deskripsi_p, $this->nilai_k, $this->deskripsi_k, auth()->user()->uuid]);
            $this->reset();
            $this->dispatchBrowserEvent('insert-alert');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
