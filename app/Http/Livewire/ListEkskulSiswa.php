<?php

namespace App\Http\Livewire;

use App\Models\Ekstrakurikuler;
use App\Models\LogActivity;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ListEkskulSiswa extends Component
{
    public $ekskul_siswa;

    // protected $listeners = [
    //     'storeEkskul'=> 'render',
    //     'updateEkskul'=> 'render'
    // ];

    public function render()
    {
        $this->ekskul_siswa = DB::table('list_ekstrakurikuler_siswa')
        ->get();
        return view('livewire.list-ekskul-siswa');
    }

    // public function editEkskul($id) {
    //     $this->emit('editEkskul', $id);
    // }

    public function deleteEkskulSiswa($id) {
        try {
        DB::select('call delete_ekstrakurikuler_siswa(?, ?)', [auth()->user()->uuid, $id]);
        $this->render();
        $this->emit('deleteEkskulSiswa');
        $this->dispatchBrowserEvent('delete-modal');
        $this->dispatchBrowserEvent('delete-alert');
        } catch (\Throwable $th) {
            dd ($th);
        }
        // DB::select('call delete_ekstrakurikuler_siswa(?, ?)', [auth()->user()->uuid, $id]);

        // $this->render();
        // $this->emit('deleteEkskulSiswa');
        // $this->dispatchBrowserEvent('delete-modal');
        // $this->dispatchBrowserEvent('delete-alert');
    }
}
