@extends('posts.layout')
@section('content')

    <div class="card" style="margin:20px;">
        <div class="card-header">posts Page</div>
        <div class="card-body">
            <div class="card-body">
                <h5 class="card-title">Title : {{ $post->title }}</h5>
                <p class="card-text">desc : {{ $post->desc }}</p>
                <p class="card-text">content : {{ $post->content }}</p>
              
                <br>
                <b>comments</b>
                @foreach($comments as $comment)
                <p class="card-text"> {{ $comment->content }}</p> by  <p class="card-text"> {{ $comment->user->name }}
                @endforeach
                <br>
            </div>
           
            <div class="card-body">
            <b> add a comment<b>
                <form method="post" action="{{route('create_comment', ['pid' =>$post->id])}}">
                  @csrf
                <input type="text" name="content">
                <input type="submit">
                </form>
            </div>
           
        </div>
        <a href="{{url('/posts')}}">Go Back Home</a>
    </div>
