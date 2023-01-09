<?php

namespace App\Http\Livewire;


use Livewire\Component;

use Illuminate\Support\Facades\DB;

use App\Models\Ekstrakurikuler;
use App\Models\Siswa;

class InfoCardEkskulSiswa extends Component
{

    protected $listeners = [
        'assignSiswa'=> 'render',
        'unassignSiswa' => 'render',
    ];

    public function render()
    {
        $data = DB::table('list_ekstrakurikuler')->where('NUPTK', auth()->user()->gurus->NUPTK)->first();
        $anggota = $data->anggota;
        $jadwal = [
            'hari' => $data->hari,
            'waktu_mulai' => $data->waktu_mulai,
            'waktu_akhir' => $data->waktu_akhir
        ];
        return view('livewire.info-card-ekskul-siswa', compact('anggota', 'jadwal'));
    }
}
