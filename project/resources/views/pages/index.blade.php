@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>{{$title}}</h1>
        <p>Give us ya car and we'll give it to a stranger</p>
        <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-info btn-lg" href="/register" role="button">Register</a></p>
        <p><a href="/about">About</a></p>
@endsection

