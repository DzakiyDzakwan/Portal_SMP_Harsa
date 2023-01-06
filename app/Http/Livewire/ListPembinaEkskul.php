<?php

namespace App\Http\Livewire;

use App\Models\Ekstrakurikuler;
use App\Models\LogActivity;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ListPembinaEkskul extends Component
{
    public $pembina_ekskul;

    protected $listeners = [
        'updatePembinaEkskul'=> 'render'
    ];

    public function render()
    {
        $this->pembina_ekskul = DB::table('list_pembina_ekstrakurikuler')
        ->get();
        return view('livewire.list-pembina-ekskul');
    }

    // public function editEkskul($id) {
    //     $this->emit('editEkskul', $id);
    // }

    public function restorePembina($id) {
        $pembina = Ekstrakurikuler::where('ekstrakurikuler_id', $id);
        DB::select('CALL restore_pembina_ekskul(?, ?)', [$id, auth()->user()->uuid]);
        $this->dispatchBrowserEvent('restore-alert');
        $this->dispatchBrowserEvent('restore-modal');
    }
}
