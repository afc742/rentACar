@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Posts</h1>
    <hr>
    @if(count($posts) > 0)
        <div class="container-fluid">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-sm-4">
                        <div class="well">
                            <div class="">
                            <img style="width=100%" src="/storage/car_images/{{$post->car_img}}">
                            </div>
                            <div class="">
                                <h3><a href="/posts/{{$post->id}}">{{$post->make}} {{$post->model}} - {{$post->year}}</a></h3>
                                <small>Created on {{$post->created_at}}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{$posts->links()}}
    @else
        <p>No posts</p>
    @endif

@endsection