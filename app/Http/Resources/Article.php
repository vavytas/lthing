<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Comment;
class Article extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return[
            'id'=>$this->id,
            'title'=> $this->title,
            'body'=> $this->body
            
        ];
    }

    public function with($request){
        return[
            'postedon' => $this->created_at
             #'comment' => Comment::collection($this->whenLoaded('comment'))
        ];

    }

}
