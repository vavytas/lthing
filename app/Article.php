<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function comment(){

        return $this->belongsTo(Comment::class);

    }
}
