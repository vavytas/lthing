<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Article;
use App\Http\Resources\Article as ArticleResource;
use App\Comment;
use App\Http\Resources\Comment as CommentResource;
use Illuminate\Database\Eloquent\Builder;
use App\Exceptions\Handler;
use Illuminate\Auth\AuthenticationException;

class ArticleController extends Controller
{

function __construct(){
    return $this->middleware('auth:api');
}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get articles
        $articles = Article::all();
        //return as a resource
        return ArticleResource::collection($articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = $request->isMethod('put') ? Article::findOrFail
        ($request->article_id) : new Article;

        $article->id = $request->input('article_id');
        $article->title = $request->input('title');
        $article->body = $request->input('body');
        $article->userc_id = $request->user()->id;
        if($article->save()){
            return new ArticleResource($article);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $article = Article::findOrFail($id)->with('comment')->where('id', $id)->get();
          }
          catch (\Exception $e) {
            
            return $e->getMessage();
          }
        
       // $articlec = Article::find($id)->comment;
        //$art = $article->with($articlec);
        //return article
        //return new ArticleResource($article);
        //$articles = Article::where($id = $article->id)->get();
        return $article; 
        //CartItem::where('id_cart', $carrinho->id)->with('product.images')->get();
        //return new ArticleResource($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        try {
            $article = Article::findOrFail($id);
          }
          catch (\Exception $e) {
            
            return $e->getMessage();
          }
      
        if($article->delete()){
            return new ArticleResource($article);
        }
    }
}
