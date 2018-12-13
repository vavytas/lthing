<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=['body', 'post_id'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
    
    public function user()
    {
        return $this->belongsTo(Article::class);
    }

}
