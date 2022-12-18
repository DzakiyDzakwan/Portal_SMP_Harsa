<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class HistoryKonfirmasiModal extends Component
{

    protected $listeners = [
        'validateNilai'=>'render'
    ];

    public function render()
    {
        $nilai = DB::table('list_nilai')->get();
        return view('livewire.history-konfirmasi-modal', compact("nilai"));
    }
}
