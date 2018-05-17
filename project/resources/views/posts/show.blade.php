@extends('layouts.app')

@section('content')

<div class="container">
    <a href="/posts" class="btn btn-default">Go Back</a>
    <h1>{{$post->make}} {{$post->model}} - {{$post->year}}</h1>
    
    <div class="row">
        <div class="col-md-6">
            <div class="well">
                <p><b>Type: </b>{{$post->type}}</p> 
                <p><b>Transmission: </b>{{$post->trans}}</p>
                <p><b>Seats: </b>{{$post->seats}}</p>
                <p><b>Doors: </b>{{$post->doors}}</p>
                <br><br><br><br>
            </div>
        </div>
        <div class="col-md-6 text-center well">
            <img style="width=100%" src="/storage/car_images/{{$post->car_img}}">
            <br><br>
        </div>
    </div>

    <div class="container">
        <div id="map-canvas"></div>
    </div>

    <br>

    <div class="well">
            <p><b>Description:</b></p>
            <p>{{$post->desc}}</p>
        </div>
    <hr>
    <small>Created on {{$post->created_at}}</small>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlTjBH4hS_0AL3W0L4lpz24mR0HVZILDc" type="text/javascript"></script>
<script>
        var lat = {{$post->lat}};
        var lng = {{$post->lng}};
        var map = new google.maps.Map(document.getElementById('map-canvas'),{
          center:{
            lat: lat,
            lng: lng
          },
          zoom: 15
        });
        var marker = new google.maps.Marker({
          position:{
            lat:lat,
            lng: lng
          },
          map:map
        });
        google.maps.event.trigger(map, "resize");
</script>

@endsection

