<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function posts()// \Illuminate\Database\Eloquent\Relations\
    {
        //laravel relation types hasoNE, hasMany, belongsTo, belongsToMany
        return $this->hasMany(Post::class);
        // return $this->belongsTo();
    }
}
