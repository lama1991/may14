<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class EditDeleteMiddle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) 
        {
           $id=$request->route('post');
           $post=Post::find($id);
           if($post->user_id==Auth::id())
           {
            return $next($request);
           }
           else
           {
            return redirect('posts');
           }
           
        }
        
        else
        {
        return redirect('login');
        }
       
    }
}
