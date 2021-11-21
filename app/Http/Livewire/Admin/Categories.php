<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class Categories extends Component
{
    public $categories;
    public $categoryTitle,$categorySlug;
    public function mount()
    {
        $this->categoryTitle = NULL;
    }
    public function addCategory()
    {
        Category::create([
            'title' => $this->categoryTitle
        ]);
        $this->dispatchBrowserEvent('closeModal');
    }
    public function render()
    {
        $this->categorySlug = $this->categoryTitle ? Str::slug($this->categoryTitle) : NULL;
        $this->categories = Category::with('articles')->get()->sortDesc();
        return view('livewire.admin.categories');
    }
}
