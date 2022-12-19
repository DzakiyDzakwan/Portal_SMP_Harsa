<?php

namespace App\Http\Livewire;

use App\Models\Ekstrakurikuler;
use App\Models\LogActivity;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ListEkskul extends Component
{
    public $ekskuls;

    protected $listeners = [
        'storeEkskul'=> 'render',
        'updateEkskul'=> 'render'
    ];

    public function render()
    {
        $this->ekskuls = DB::table('list_ekstrakurikuler')
        ->get();
        return view('livewire.list-ekskul');
    }

    public function editEkskul($id) {
        $this->emit('editEkskul', $id);
    }

    public function deleteEkskul($id) {
        // Ekstrakurikuler::where('ekstrakurikuler_id', $id)->delete();

        // LogActivity::create([
        //     'actor' => auth()->user()->uuid,
        //     'action' => 'delete',
        //     'at' => 'ekstrakurikulers'
        // ]);

        DB::select('call delete_ekstrakurikuler(?, ?)', [auth()->user()->uuid, $id]);

        $this->render();
        $this->emit('deleteEkskul');
        $this->dispatchBrowserEvent('delete-modal');
        $this->dispatchBrowserEvent('delete-alert');
    }
}
