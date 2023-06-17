<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    public function store(Request $request,$pid)
    {
        $comment=Comment::create([
        'content'=>$request['content'],
         'post_id'=>$pid,
         'user_id'=>Auth::id()
       ] );
       return redirect()->route('posts.show',['post'=>$pid]);
       

    }
}
