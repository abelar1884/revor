<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaType extends Model
{
    protected $fillable = [
        'title'
    ];

    public function medias()
    {
        return $this->belongsToMany();
    }
}
