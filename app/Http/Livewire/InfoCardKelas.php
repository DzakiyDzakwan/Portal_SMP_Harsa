<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kelas;
use Illuminate\Support\Facades\DB;

class InfoCardKelas extends Component
{

    public $totalKelas;

    protected $listeners = [
        'storeKelas' => 'render'
    ];

    public function render()
    {
        
        $this->totalKelas = DB::table('kelas')
        ->where('deleted_at', '=', null)
        ->count();
        return view('livewire.sekolah.manajemen-kelas.kelas.info-card-kelas');
    }
}
