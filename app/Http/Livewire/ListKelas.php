<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kelas;
use Illuminate\Support\Facades\DB;

class ListKelas extends Component
{
    public $kelas;

    protected $listeners = [
        'storeKelas' => 'render'
    ];

    public function render()
    {
        $this->kelas = DB::table('table_kelas')->get();;
        return view('admin.components.livewire.list-kelas');
    }
}
