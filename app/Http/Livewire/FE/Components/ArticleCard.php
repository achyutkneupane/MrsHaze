<?php

namespace App\Http\Livewire\FE\Components;

use Livewire\Component;

class ArticleCard extends Component
{
    public $article;
    public function mount($article)
    {
        $this->article = $article;
    }
    public function render()
    {
        return view('livewire.f-e.components.article-card');
    }
}
