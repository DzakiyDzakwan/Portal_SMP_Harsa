<?php

namespace App\Http\Livewire;

use App\Models\Ekstrakurikuler;
use App\Models\LogActivity;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use PhpParser\Node\Stmt\TryCatch;

class CreateModalEkskul extends Component
{
    public $ekstrakurikuler_id, $nama, $hari, $waktu_mulai, $waktu_akhir, $tempat, $kelas;
    public function store(){
        try {
            $this->validate([
                'ekstrakurikuler_id' => 'required|min:3|max:5|unique:ekstrakurikulers',
                'nama' => 'required|unique:ekstrakurikulers',
                'hari' => 'required',
                'waktu_mulai' => 'required',
                'waktu_akhir' => 'required',
                'tempat' => 'required',
                'kelas' => 'required'
            ]);
            DB::select('CALL add_ekstrakurikuler(?, ?, ?, ?, ?, ?, ?, ?)', [auth()->user()->uuid, $this->ekstrakurikuler_id, $this->nama, $this->hari, $this->waktu_mulai, $this->waktu_akhir, $this->tempat, $this->kelas]);
    
            $this->render();
            $this->emit('storeEkskul');
            $this->dispatchBrowserEvent('insert-alert');
            $this->dispatchBrowserEvent('close-create-modal');
        } catch (\Throwable $th) {
            dd($th);
        }
        
    }
    public function render()
    {
        return view('livewire.create-modal-ekskul');
    }
}
