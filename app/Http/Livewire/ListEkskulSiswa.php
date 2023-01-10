<?php

namespace App\Http\Livewire;

use App\Models\Ekstrakurikuler;
use App\Models\LogActivity;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ListEkskulSiswa extends Component
{
    public $ekskul_siswa;

    protected $listeners = [
        'assign-ekskul-siswa' => 'render',
        'add-nilai' => 'render',
        'store-nilai' => 'render'
    ];


    public function render()
    {
        $tahunAkademik = DB::table('list_tahun_ajaran')->whereRaw('status = "aktif" COLLATE utf8mb4_general_ci')->first();
        if($tahunAkademik != null) {
            $tahunAjaranAktif = $tahunAkademik->tahun_ajaran;
        }
        $ekskul = auth()->user()->gurus->ekstrakurikulers->ekstrakurikuler_id;
        $siswa = DB::table('list_ekstrakurikuler_siswa')->where('id', $ekskul)->where('tahun_ajaran', $tahunAjaranAktif)
            ->get();
        $sesi = DB::table("list_sesi_penilaian")->whereRaw('nama_sesi = "uas" COLLATE utf8mb4_general_ci AND status = "aktif" COLLATE utf8mb4_general_ci')->first();
        return view('livewire.list-ekskul-siswa', compact('siswa', 'sesi'));
    }

    // public function editEkskul($id) {
    //     $this->emit('editEkskul', $id);
    // }

    public function deleteEkskulSiswa($siswa)
    {
        try {
            $tahunAkademik = DB::table('list_tahun_ajaran')->whereRaw('status = "aktif" COLLATE utf8mb4_general_ci')->first();
            if($tahunAkademik != null) {
                $tahunAjaranAktif = $tahunAkademik->tahun_ajaran;
            }
            $ekskul = auth()->user()->gurus->ekstrakurikulers->ekstrakurikuler_id;
            DB::select('call delete_ekstrakurikuler_siswa(?, ?, ?, ?)', [$ekskul, $siswa, $tahunAjaranAktif, auth()->user()->uuid]);
            $this->render();
            $this->emit('unassign-ekskul-siswa');
            $this->dispatchBrowserEvent('delete-modal');
            $this->dispatchBrowserEvent('delete-alert');
        } catch (\Throwable $th) {
            dd($th);
        }
        // DB::select('call delete_ekstrakurikuler_siswa(?, ?)', [auth()->user()->uuid, $id]);

        // $this->render();
        // $this->emit('deleteEkskulSiswa');
        // $this->dispatchBrowserEvent('delete-modal');
        // $this->dispatchBrowserEvent('delete-alert');
    }

    public function showModal($id)
    {
        $this->emit('showModal', $id);
    }
}
