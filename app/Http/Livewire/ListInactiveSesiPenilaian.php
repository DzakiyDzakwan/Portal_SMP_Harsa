<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;
class ListInactiveSesiPenilaian extends Component
{
    
    public $inactivesesipenilaian;

    protected $listeners = [
        'inactiveMapelGuru' => 'render',
        'deleteMapelGuru' => 'render',
        'restoreMapelGuru' => 'render'
    ];
    public function render()
    {
        $this->inactivesesipenilaian = DB::table('list_sesi_penilaian')->get();
       
        return view('livewire.list-inactive-sesi-penilaian');
    }
    
    public function getRestoreModal($id)
    {
        $this->emit('getRestoreModal', $id);
        DB::table('list_sesi_penilaian')->where('sesi_id', $id) 
        ->limit(1)  
        ->update(array('status' => 'Aktif'));
    }

    public function getDeleteModal($id)
    {
        $this->emit('getDeleteModal', $id);
    }
}
