<?php

namespace App\Http\Livewire\Admin;

use App\Models\Article;
use Livewire\Component;

class Articles extends Component
{
    public $articles;
    public function mount()
    {

    }
    public function render()
    {
        $this->articles = Article::with('category')->get()->sortDesc();
        return view('livewire.admin.articles');
    }
}
