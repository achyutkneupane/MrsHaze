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

    public $article,$articleID;
    public $articleContent,$articleTags,$articleTitle,$articleSlug,$seoDescription,$category='',$categories,$featuredImage,$tags;
    public $attributes;
    public function mount($id)
    {
        $this->article = Article::with('media','category','tags')->find($id);
        $this->articleID = $this->article->id;
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
            'articleTags' => 'required',
            'category' => 'required'
        ]);
        $article = Article::find($this->articleID);
        $article->title = $this->articleTitle;
        $article->description = $this->seoDescription;
        $article->content = $this->articleContent;
        $article->published_at = now();
        $tagsToAttach = collect();
        foreach(json_decode($this->articleTags) as $tag)
        {
            if(!isset($tag->id))
            {
                $newTag = Tag::create([
                    'title'=>$tag->value,
                ]);
                $tagsToAttach->push($newTag->id);
            }
            else
            {
                $tagsToAttach->push($tag->id);
            }
        }
        $article->tags()->sync($tagsToAttach);
        $article->writer()->associate(1);
        $article->category()->associate($this->category);
        if($this->featuredImage)
        {
            $extension = $this->featuredImage->extension();
            $path = 'uploads/'.$this->articleSlug.'-'.now()->timestamp.'.'.$extension;
            $article->addMedia($this->featuredImage->getRealPath())
                        ->usingFileName($path)
                        ->usingName($path)
                        ->toMediaCollection('cover');
        }
        $article->save();
        return redirect()->to('/article/'.$this->articleSlug);
    }
    public function render()
    {
        $this->categories = Category::all();
        $this->tags = str_replace("'title'","'value'",str_replace('"', "'", json_encode(Tag::get(['id','title']))));
        return view('livewire.admin.edit-article');
    }
}
