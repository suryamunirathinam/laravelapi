<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Comment;
use App\Http\Resources\Comment as CommentResource; 
class CommentController extends Controller
{
 
    public function index()
    {
        $comments=Comment::paginate(15);
        return CommentResource::collection($comments);
    }

  
    public function store(Request $request)
    {
        $comment = $request->isMethod('put')?Article::findOrFail($request->comment_id):new Comment;
        $comment->id = $request->input('comment_id');
        $comment->display = $request->input('display');
        
        if($comment->save()){
            return new CommentResource($comment);
        }
    }

    
    public function show($id)
    {
        $comment = Comment::findOrFail($id);
        return new CommentResource($comment);

    }

   
   

    public function destroy($id)
    {
        $comment =  Comment::findOrFail($id);
        if($comment->delete()){
            return new CommentResource($comment);
        }
    }
}
