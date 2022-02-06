<?php

namespace App\Http\Livewire\FE\Components;

use App\Mail\Subscribe;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Footer extends Component
{
    public $email,$subscribed=false;
    public function subscribe()
    {
        $this->validate([
            'email' => 'required|email|unique:subscribers,email',
        ],[
            'email.required' => 'Please enter your email address',
            'email.email' => 'Please enter a valid email address',
            'email.unique' => 'This email address is already subscribed',
        ]);
        Subscriber::create([
            'email' => $this->email,
        ]);
        Mail::to($this->email)
            ->send(new Subscribe($this->email));
        $this->subscribed = true;
        $this->reset('email');
    }
    public function updatedEmail()
    {
        $this->subscribed = false;
    }
    public function render()
    {
        return view('livewire.f-e.components.footer');
    }
}
