@extends('layouts.app')
@if (Route::has('login'))
@auth
@section('content')  
            @include("\home")
@endsection
@else
@section('content')
    <div class="jumbotron">
        <div class="container jumbo">
            <h1>{{$title}}</h1>
            <p>Give us ya car and we'll give it to a stranger</p>
            <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-info btn-lg" href="/register" role="button">Register</a></p>    
        </div>
    </div>
    <div class="banner_arrow" id="about">
        <br>
        <p>Hmmm, why give car?</p2>
	</div>
    <br><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <p>CarApp is a great alternative to owning a car. And as a CarApp member you can use a wide selection of strangers cars, 
                    as and when you need to and only pay for what you use.</p>
                    <p>Just select a car and required time and lock it in, we will then send you a pickup location and code to access the car, 
                    simple as that!</p>
                    <p>This is a great asset to utilise in a situation where you need a vehicle short-term, saving you the hassle and cost of per-day 
                    rental. Take advantage of the convenience and simplicity and you're sure to love it.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
@endauth
@endif


