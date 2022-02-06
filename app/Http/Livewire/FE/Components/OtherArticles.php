<?php

namespace App\Http\Livewire\FE\Components;

use App\Models\Article;
use Livewire\Component;

class OtherArticles extends Component
{
    public $others;
    public function mount($slug)
    {
        $this->others = Article::with('media','category')->where('published_at','!=',NULL)->where('slug','!=',$slug)->take(9)->orderByDesc('id')->get();
    }
    public function render()
    {
        return view('livewire.f-e.components.other-articles');
    }
}
