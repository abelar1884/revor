<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medias extends Model
{
    protected $fillable = [
        'title',
        'file',
        'type',
        'medias_id',
        'medias_type',
    ];

    public function medias()
    {
        return $this->morphTo();
    }
}
