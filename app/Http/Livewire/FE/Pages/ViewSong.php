<?php

namespace App\Http\Livewire\FE\Pages;

use Livewire\Component;

class ViewSong extends Component
{
    public $song,$others;
    public function mount($slug)
    {
        $this->song = \App\Models\Song::where('slug',$slug)->firstOrFail();
        $this->others = \App\Models\Song::with('media')->where('slug','!=',$slug)->orderByDesc('released_at')->get();
    }
    public function render()
    {
        return view('livewire.f-e.pages.view-song');
    }
}
