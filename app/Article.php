<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function comment(){

        return $this->hasMany(Comment::class, 'post_id');

    }
    public function user()
    {
        return $this->belongsTo(Article::class);
    }
}
