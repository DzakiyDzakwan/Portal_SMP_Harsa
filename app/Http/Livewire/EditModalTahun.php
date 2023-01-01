<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\TahunAjaran;

class EditModalTahun extends Component
{

    public $tahun_akademik, $semester, $start, $end, $tahun_id;
    protected $listeners = [
        'editTahun' => 'showModal'
    ];

public function render()
    {
        return view('livewire.sekolah.tahun-akademik.edit-modal-tahun');
    }

    public function showModal($id) {
        $this->tahun_id = $id;
        $data = TahunAjaran::where('tahun_ajaran_id', $id )->first();
        $this->tahun_akademik = $data->tahun_ajaran;
        $this->semester = $data->semester;
        $this->start = $data->tanggal_mulai;
        $this->end = $data->tanggal_berakhir;
        $this->dispatchBrowserEvent('edit-modal');
    }

    public function update() {
        try {
            $start = date("Y-m-d H:i:s", strtotime($this->start));
            $end = date("Y-m-d H:i:s", strtotime($this->end));
            DB::select('call update_tahun_ajaran(?, ?, ?, ?)', [$this->tahun_id, $start, $end, auth()->user()->uuid]);
            $this->reset();
            $this->emit('updateTahun');
            $this->dispatchBrowserEvent('edit-modal');
            $this->dispatchBrowserEvent('update-alert');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
