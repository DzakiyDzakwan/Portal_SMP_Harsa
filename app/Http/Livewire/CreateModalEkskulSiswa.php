<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Ekstrakurikuler;
use App\Models\KontrakSemester;

class CreateModalEkskulSiswa extends Component
{
    public $nama_siswa, $nama_ekskul, $ta_semester;
    
    protected $rules = [
        'nama_ekskul' => 'required',
        'nama_siswa' => 'required',
        'ta_semester' => 'required',
        // 'semester_id' => 'required'
    ];

    public function render()
    {
        $siswa = User::join('siswas', 'siswas.user', '=', 'users.uuid')
        ->join('user_profiles', 'user_profiles.user', '=', 'users.uuid')
        ->join('kontrak_semesters', 'siswas.NISN', '=', 'kontrak_semesters.siswa')
        ->get();

        // $semester = KontrakSemester::join('siswas', 'siswas.user', '=', 'kontrak_semesters.siswa')
        // ->get();

        $listSiswa = [];

        foreach ($siswa as $item) {
            if($item->hasRole('siswa')){
                $listSiswa[] = [
                    "NISN" => $item->NISN,
                    "nama" => $item->nama,
                    "ta_semester" => $item->tahun_ajaran_aktif,
                    // "semester_id" => $item->kontrak_semester_id
                ];
            }
        }
        $ekstrakurikuler = DB::table('ekstrakurikulers')->select('ekstrakurikuler_id', 'nama')
        ->get();
        $this->nama_ekstrakurikuler = DB::table('list_ekstrakurikuler')->where('NUPTK', auth()->user()->gurus->NUPTK)->first()->id;
        // $semester = DB::table('kontrak_semesters')->select('siswa', 'tahun_ajaran_aktif')
        // ->get();

        if($listSiswa != null) {
            $this->nama_siswa = $listSiswa[0]["NISN"];
            $this->ta_semester = $listSiswa[0]["ta_semester"];
            // $this->semester_id = $listSiswa[0]["semester_id"];
        }

        if (!$ekstrakurikuler->isEmpty()) {
            $this->nama_ekskul = $ekstrakurikuler[0]->ekstrakurikuler_id;
        }
        // if (!$semester->isEmpty()) {
        //     $this->ta_semester = $semester[0]->tahun_ajaran_aktif;
        // }
        
        return view('livewire.create-modal-ekskul-siswa', compact('listSiswa', 'ekstrakurikuler'));
    }


    public function store() {
        // dd($this);
        $this->validate([
            'nama_ekskul' => 'required',
            'nama_siswa' => 'required',
            'ta_semester' => 'required',
            // 'semester_id' => 'required'
        ]);
        DB::select('CALL add_ekstrakurikuler_siswa(?, ?, ?, ?)', [auth()->user()->uuid, $this->nama_ekskul, $this->nama_siswa, $this->ta_semester]);
        $this->render();
        $this->emit('assignSiswa');
        $this->dispatchBrowserEvent('insert-alert');
        $this->dispatchBrowserEvent('close-create-modal');
        // session()->flash('message', 'Kelas Berhasil dibuat');
    }
    
}
