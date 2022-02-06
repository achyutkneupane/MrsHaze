<?php

namespace App\Http\Livewire\BE\Pages;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AddArticle extends Component
{
    use WithFileUploads;

    public $articleContent,$articleTags,$articleTitle,$articleSlug,$seoDescription,$category='',$categories,$featuredImage,$tags;
    public $attributes;
    public function publishArticle()
    {
        // dd($this->featuredImage);
        $this->validate([
            'articleTitle' => 'required',
            'seoDescription' => 'required',
            'articleContent' => 'required',
            'featuredImage' => 'required',
            'articleTags' => 'required',
            'category' => 'required'
        ]);
        $article = Article::create([
            'title' => $this->articleTitle,
            'description' => $this->seoDescription,
            'content' => $this->articleContent,
            'published_at' => now()
        ]);
        foreach(json_decode($this->articleTags) as $tag)
        {
            if(!isset($tag->id))
            {
                $newTag = Tag::create([
                    'title'=>$tag->value,
                ]);
                $article->tags()->attach($newTag->id);
            }
            else
            {
                $article->tags()->attach($tag->id);
            }
        }
        $article->writer()->associate(1);
        $article->category()->associate($this->category);
        $extension = $this->featuredImage->extension();
        $path = 'uploads/'.$this->articleSlug.'-'.now()->timestamp.'.'.$extension;
        $article->addMedia($this->featuredImage->getRealPath())
                    ->usingFileName($path)
                    ->usingName($path)
                    ->toMediaCollection('cover');
        $article->save();
        return redirect()->to('/article/'.$this->articleSlug);
    }
    public function render()
    {
        $this->articleSlug = $this->articleTitle ? Str::slug($this->articleTitle) : NULL;
        $this->categories = Category::all();
        $this->tags = str_replace("'title'","'value'",str_replace('"', "'", json_encode(Tag::get(['id','title']))));
        return view('livewire.b-e.pages.add-article');
    }
}
