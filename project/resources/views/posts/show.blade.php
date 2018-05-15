@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/posts" class="btn btn-default">Go Back</a>
    <h1>{{$post->make}} {{$post->model}} - {{$post->year}}</h1>
    <div class="well">
        <p><b>Type: </b>{{$post->type}}</p> 
        <p><b>Transmission: </b>{{$post->trans}}</p>
        <p><b>Seats: </b>{{$post->seats}}</p>
        <p><b>Doors: </b>{{$post->doors}}</p>
    </div>
    <div class="well">
            <p><b>Description:</b></p>
            <p>{{$post->desc}}</p>
        </div>
    <hr>
    <small>Created on {{$post->created_at}}</small>
</div>
@endsection