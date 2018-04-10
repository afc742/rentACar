@extends('layouts.app')
@if (Route::has('login'))
@auth
@section('content')  
            <h1>"LOGGED IN"</h1>
@endsection
@else
@section('content')  
        <div class="jumbotron text-center">
            <h1>{{$title}}</h1>
            <p>Give us ya car and we'll give it to a stranger</p>
            <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-info btn-lg" href="/register" role="button">Register</a></p>    
@endsection
@endauth
@endif


