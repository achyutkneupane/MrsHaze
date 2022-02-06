<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Song extends Model implements HasMedia
{
    use HasFactory,SoftDeletes,InteractsWithMedia, Sluggable;
    protected $dates = ['deleted_at'];
    protected $guarded = [];
    protected $appends = [
        'cover',
        'medium_cover',
    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function getCoverAttribute()
    {
        return $this->getMedia('cover')->count() ? $this->getMedia('cover')->last()->getUrl() : null;
    }
    public function getMediumCoverAttribute()
    {
        return $this->getMedia('cover')->count() ? $this->getMedia('cover')->last()->getUrl('medium') : null;
    }
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('medium')
            ->format(Manipulations::FORMAT_WEBP)
            ->width(300)
            ->height(300)
            ->nonQueued();
    }
}