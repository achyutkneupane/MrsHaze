<?php

namespace App\Http\Livewire\BE\Pages;

use App\Models\Song;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditSong extends Component
{
    use WithFileUploads;

    public $song,$songID;
    public $songDescription,$releasedAt,$songTitle,$songSlug,$seoText,$featuredImage;
    public $youtube,$noodle,$spotify;
    public function mount($id)
    {
        $this->song = Song::with('media')->find($id);
        $this->songID = $this->song->id;
        $this->songDescription = $this->song->description;
        $this->songTitle = $this->song->title;
        $this->songSlug = $this->song->slug;
        $this->seoText = $this->song->seo_text;
        $this->releasedAt = $this->song->released_at;
        $this->youtube = $this->song->youtube;
        $this->noodle = $this->song->noodle;
        $this->spotify = $this->song->spotify;
    }
    public function updateSong()
    {
        $this->validate([
            'songTitle' => 'required',
            'seoText' => 'required',
            'songDescription' => 'required',
            'songSlug' => 'required',
            'releasedAt' => 'required',
            'youtube' => 'required'
        ]);
        $song = Song::find($this->songID);
        $song->title = $this->songTitle;
        $song->seo_text = $this->seoText;
        $song->description = $this->songDescription;
        $song->slug = $this->songSlug;
        $song->released_at = $this->releasedAt;
        $song->youtube = $this->youtube;
        $song->noodle = $this->noodle;
        $song->spotify = $this->spotify;
        if($this->featuredImage)
        {
            $extension = $this->featuredImage->extension();
            $path = 'uploads/'.$this->songSlug.'-'.now()->timestamp.'.'.$extension;
            $song->addMedia($this->featuredImage->getRealPath())
                        ->usingFileName($path)
                        ->usingName($path)
                        ->toMediaCollection('cover');
        }
        $song->save();
        return redirect()->to('/song/'.$this->songSlug);
    }
    public function render()
    {
        return view('livewire.b-e.pages.edit-song');
    }
}
