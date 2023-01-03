<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Nilai;

class ListNilaiPending extends Component
{
    public function render()
    {
        $nilai_pending = DB::table('nilais')->get();
        return view('livewire.list-nilai-pending', compact('nilai_pending'));
    }

    public function accept($id) {

        Nilai::where('nilai_id', $id)->update([
            'status'=>"confirmed"
        ]);

        $this->emit("validateNilai");

    }

    public function decline($id) {
        Nilai::where('nilai_id', $id)->update([
            'status'=>"rejected"
        ]);
        $this->emit("validateNilai");
    }
}
