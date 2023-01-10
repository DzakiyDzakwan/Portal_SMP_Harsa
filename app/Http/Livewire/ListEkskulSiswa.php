<?php

namespace App\Http\Livewire;

use App\Models\Ekstrakurikuler;
use App\Models\LogActivity;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ListEkskulSiswa extends Component
{
    public $ekskul_siswa;

    protected $listeners = [
        'insertEkskulSiswa' => 'render',
        //'showModal'
        // 'updateEkskul'=> 'render'
    ];


    public function render()
    {
        $ekskul = auth()->user()->gurus->ekstrakurikulers->ekstrakurikuler_id;
        $siswa = DB::table('list_ekstrakurikuler_siswa')->where('id', $ekskul)->where('tahun_ajaran', '2022-2023')
            ->get();
        return view('livewire.list-ekskul-siswa', compact('siswa'));
    }

    // public function editEkskul($id) {
    //     $this->emit('editEkskul', $id);
    // }

    public function deleteEkskulSiswa($id)
    {
        try {
            DB::select('call delete_ekstrakurikuler_siswa(?, ?)', [auth()->user()->uuid, $id]);
            $this->render();
            $this->emit('deleteEkskulSiswa');
            $this->dispatchBrowserEvent('delete-modal');
            $this->dispatchBrowserEvent('delete-alert');
        } catch (\Throwable $th) {
            dd($th);
        }
        // DB::select('call delete_ekstrakurikuler_siswa(?, ?)', [auth()->user()->uuid, $id]);

        // $this->render();
        // $this->emit('deleteEkskulSiswa');
        // $this->dispatchBrowserEvent('delete-modal');
        // $this->dispatchBrowserEvent('delete-alert');
    }

    public function showModal($id)
    {
        $this->emit('showModal', $id);
    }
}
