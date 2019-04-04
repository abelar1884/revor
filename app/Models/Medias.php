<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medias extends Model
{
    protected $fillable = [
        'title',
        'file',
        'type',
        'model_id'
    ];

    public function medias()
    {
        return $this->morphTo();
    }
}
