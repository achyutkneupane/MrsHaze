<?php

namespace App\Http\Livewire\Guest;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $email,$password;
    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email',$this->email)->first();
        if(Hash::check($this->password, $user->password)) {
            Auth::loginUsingId($user->id);
            redirect()->route('admin.home');
        }
        else {
            $this->addError('password','You have entered wrong password.');
        }
    }
    public function render()
    {
        return view('livewire.guest.login');
    }
}
