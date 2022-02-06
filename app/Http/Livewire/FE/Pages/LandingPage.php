<?php

namespace App\Http\Livewire\FE\Pages;

use App\Models\Article;
use Livewire\Component;

class LandingPage extends Component
{
    public $articles;
    public function mount()
    {

    }
    public function render()
    {
        $this->articles = Article::with('media','category')->where('published_at','!=',NULL)->orderByDesc('id')->get();
        return view('livewire.f-e.pages.landing-page');
    }
}
