<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CreateTahunAkademik extends Component
{
    public $tahun_akademik, $semester, $start, $end;

    public function render()
    {
        return view('livewire.sekolah.tahun-akademik.create-tahun-akademik');
    }

    public function store() {
        try {
            $start = date("Y-m-d H:i:s", strtotime($this->start));
            $end = date("Y-m-d H:i:s", strtotime($this->end));
            DB::select('CALL add_tahun_ajaran(?, ?, ?, ?, ?)', [$this->tahun_akademik, $this->semester, $start, $end, auth()->user()->uuid]);
            $this->reset();
            $this->emit('createTahun');
            $this->dispatchBrowserEvent('close-create-modal');
            $this->dispatchBrowserEvent('insert-alert');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
