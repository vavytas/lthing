<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Article;
use App\Http\Resources\Article as ArticleResource;
use App\Comment;
use App\Http\Resources\Comment as CommentResource;
use Illuminate\Database\Eloquent\Builder;
use App\Exceptions\Handler;



class ArticleinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        //return as a resource
        return CommentResource::collection($comments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id)->with('comment')->where('id', $id)->get();
        return $article;
    }

    public function show2($id)
    {
        $article = Article::findOrFail($id);
        return $article;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    
        
        $article = Article::findOrFail($id);
        
        

        if($article->delete()){
            return new ArticleResource($article);
        }
    
    }
}
