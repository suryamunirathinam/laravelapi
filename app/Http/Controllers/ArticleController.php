<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Article;
use App\Http\Resources\Article as ArticleResource; 
// to avoid confusion with the model 
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get articles
        $articles=Article::paginate(15); 
        // we need to bring this one in 
        // return collection of articles as resource
        // when we bring in a list of item we need to bring collections 

        return ArticleResource::collection($articles);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = $request->isMethod('put')?Article::findOrFail($request->article_id):new Article;
        $article->id =$request->input('article_id');
        $article->title =$request->input('title');
        $article->body =$request->input('body');

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
        //

        $article = Article::findOrFail($id);
        // return single article as resource
        return new ArticleResource($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

   
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
    }}
}
