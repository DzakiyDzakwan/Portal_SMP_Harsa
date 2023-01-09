<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePasswordGuru extends Component
{
    public $password, $password_confirmation;
    public function render()
    {
        return view('livewire.change-password-guru');
    }
    public function update(){
        $rules = [
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ];

        $this->validate($rules);

        if($this->password = $this->password_confirmation){
            User::where('uuid', Auth::user()->uuid)
            ->update([
                'password' => Hash::make($this->password)
            ]);
            $this->dispatchBrowserEvent('password-alert');
        }

        
    }
}
