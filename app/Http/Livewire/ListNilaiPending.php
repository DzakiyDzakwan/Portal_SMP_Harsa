<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Nilai;

class ListNilaiPending extends Component
{
    public $konfirmasiNilai, $tahun_ajaran_aktif, $mapel;

    public function render()
    {
        $nilai_pending = DB::table('list_nilai_pending')->get();
        return view('livewire.list-nilai-pending', compact('nilai_pending'));
    }

    // protected $listeners = [
    //     'updateKelasAktif' => 'render',
    //     'filter'
    // ];

    public function filter($data)
    {
        $this->mapel = $data;
    }

    public function accept($id)
    {

        Nilai::where('nilai_id', $id)->update([
            'status' => "confirmed"
        ]);

        $this->emit("validateNilai");
        $this->dispatchBrowserEvent('insert-alert');
    }
}
