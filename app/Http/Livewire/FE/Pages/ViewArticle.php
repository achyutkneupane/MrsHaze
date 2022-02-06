<?php

namespace App\Http\Livewire\FE\Pages;

use App\Models\Article;
use Livewire\Component;

class ViewArticle extends Component
{
    public $slug,$post,$content;
    public function mount($slug)
    {
        $this->slug = $slug;
        $this->post = Article::where('slug',$slug)->first();
        $this->content = explode("\n", $this->post->content);
    }
    public function render()
    {
        $this->post->views += 1;
        $this->post->save();
        return view('livewire.f-e.pages.view-article');
    }
}
