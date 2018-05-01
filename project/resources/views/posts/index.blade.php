@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Posts</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="well">
            <h3><a href="/posts/{{$post->id}}">{{$post->make}} {{$post->model}} - {{$post->year}}</a></h3>
                <small>Created on {{$post->created_at}}</small>
            </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No posts</p>
    @endif
</div>
@endsection