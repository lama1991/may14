@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    Your roles are <br>
                        @foreach(auth()->user()->roles()->get() as $role)
                        {{$role->role_name}} <br>
                        @endforeach
                </div>
                <div class="card-body">
                   people commented to you
                   @foreach(auth()->user()->comments as $comment)
                   <br>
                   {{$comment->user->name}}
                   @endforeach
                </div>

                <a href="posts">posts index</a>
            </div>
        </div>
    </div>
</div>
@endsection
