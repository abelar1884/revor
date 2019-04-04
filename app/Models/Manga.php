<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    protected $fillable = [
        'title',
        'count_page'
    ];

    public function pages()
    {
        return $this->hasMany(Medias::class, 'model_id');
    }

    public function tags()
    {
        return $this->morphToMany('App\Models\Tag','taggable','taggables');
    }
}
