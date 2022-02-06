<?php

namespace App\Http\Livewire\BE\Pages;

use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Str;

class Tags extends Component
{
    public $tags;
    public $tagTitle,$tagSlug;
    public function mount()
    {
        $this->tagTitle = NULL;
    }
    public function addTag()
    {
        Tag::create([
            'title' => $this->tagTitle
        ]);
        $this->dispatchBrowserEvent('closeModal');
    }
    public function render()
    {
        $this->tagSlug = $this->tagTitle ? Str::slug($this->tagTitle) : NULL;
        $this->tags = Tag::with('articles')->get()->sortDesc();
        return view('livewire.b-e.pages.tags');
    }
}
