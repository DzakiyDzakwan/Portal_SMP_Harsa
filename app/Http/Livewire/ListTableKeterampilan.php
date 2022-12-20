<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use App\Models\Nilai;

use Livewire\Component;

class ListTableKeterampilan extends Component
{
    public $jenis, $kontrak;

    public function render()
    {
        /* $kelompokA = Nilai::where('kontrak_siswa', $this->kontrak)->where('jenis', $this->jenis)->where()->get();
        dd($kelompokA); */
        return view('livewire.list-table-keterampilan');
    }
}
