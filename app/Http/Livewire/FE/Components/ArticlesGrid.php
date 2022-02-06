<?php

namespace App\Http\Livewire\FE\Components;

use Livewire\Component;

class ArticlesGrid extends Component
{
    public $articles;
    public function mount($articles)
    {
        $this->articles = $articles;
    }
    public function render()
    {
        return view('livewire.f-e.components.articles-grid');
    }
}
