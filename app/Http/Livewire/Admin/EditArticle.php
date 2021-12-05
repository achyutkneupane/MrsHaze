<?php

namespace App\Http\Livewire\Admin;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class EditArticle extends Component
{
    use WithFileUploads;

    public $article;
    public $articleContent,$articleTags,$articleTitle,$articleSlug,$seoDescription,$category='',$categories,$featuredImage,$tags;
    public $attributes;
    public function mount($id)
    {
        $this->article = Article::with('media','category','tags')->find($id);
        $this->articleContent = $this->article->content;
        $this->articleTitle = $this->article->title;
        $this->articleSlug = $this->article->slug;
        $this->category = $this->article->category->id;
        $this->seoDescription = $this->article->description;
        $this->articleTags = collect();
        $this->article->tags->each(function($tag) {
            $this->articleTags->push(['id' => $tag->id,'value' => $tag->title]);
        });
        $this->articleTags = json_encode($this->articleTags);
    }
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
    }
    public function render()
    {
        $this->categories = Category::all();
        $this->tags = str_replace("'title'","'value'",str_replace('"', "'", json_encode(Tag::get(['id','title']))));
        return view('livewire.admin.edit-article');
    }
}
