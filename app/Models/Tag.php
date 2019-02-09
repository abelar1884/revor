<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'title',
        'slug'
    ];

    public function mangas()
    {
        return $this->morphedByMany('App\Models\Manga', 'taggable','taggable');
    }

}
