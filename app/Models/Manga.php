<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    protected $fillable = [
        'title',
        'index_page',
        'count_page'
    ];

    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'content','ContentTag');
    }
}
