<?php

namespace App\Http\Livewire\BE\Pages;

use App\Models\Song;
use Livewire\Component;

class Songs extends Component
{
    public $songs;
    public function mount()
    {

    }
    public function render()
    {
        $this->songs = Song::get()->sortDesc();
        return view('livewire.b-e.pages.songs');
    }
}
