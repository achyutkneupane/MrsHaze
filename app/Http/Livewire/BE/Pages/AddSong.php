<?php

namespace App\Http\Livewire\BE\Pages;

use App\Models\Song;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddSong extends Component
{
    use WithFileUploads;

    public $song,$songID;
    public $songDescription,$releasedAt,$songTitle,$songSlug,$seoText,$featuredImage;
    public $youtube,$noodle,$spotify;
    public function publishSong()
    {
        $this->validate([
            'songTitle' => 'required',
            'seoText' => 'required',
            'songDescription' => 'required',
            'songSlug' => 'required',
            'releasedAt' => 'required',
            'youtube' => 'required'
        ]);
        $song = Song::create([
            'title' => $this->songTitle,
            'seo_text' => $this->seoText,
            'description' => $this->songDescription,
            'slug' => $this->songSlug,
            'released_at' => $this->releasedAt,
            'youtube' => $this->youtube,
            'noodle' => $this->noodle,
            'spotify' => $this->spotify,
        ]);
        
        $extension = $this->featuredImage->extension();
        $path = 'uploads/'.$this->songSlug.'-'.now()->timestamp.'.'.$extension;
        $song->addMedia($this->featuredImage->getRealPath())
                    ->usingFileName($path)
                    ->usingName($path)
                    ->toMediaCollection('cover');
        return redirect()->to('/song/'.$this->songSlug);
    }
    public function render()
    {
        $this->songSlug = $this->songTitle ? Str::slug($this->songTitle) : NULL;
        return view('livewire.b-e.pages.add-song');
    }
}
