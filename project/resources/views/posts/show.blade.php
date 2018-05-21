@extends('layouts.app')

@section('content')

<div class="container">
    <a href="/posts" class="btn btn-primary">Go Back</a>
    <br><br>
    <h1>{{$post->make}} {{$post->model}} - {{$post->year}}</h1>
    <h3 class="right">${{$post->price}} per day</h3>
    <h3>{{$post->location}}</h3>
    
    <div class="row">
        <div class="col-md-6">
            <div class="well">
                <p><b>Type: </b>{{$post->type}}</p> 
                <p><b>Transmission: </b>{{$post->trans}}</p>
                <p><b>Seats: </b>{{$post->seats}}</p>
                <p><b>Doors: </b>{{$post->doors}}</p>
                @if($post->petF == 1)
                    <p><b>Pet Friendly:</b> Yes</p>
                @else
                    <p><b>Pet Friendly:</b> No</p>
                @endif
                <br><br><br><br>
            </div>
        </div>
        <div class="col-md-6 text-center well">
            <img style="width=100%" src="/storage/car_images/{{$post->car_img}}">
            <br><br>
        </div>
    </div>

    <div class="container">
        <div id="map-canvas" style="width: 1100px; height: 300px; margin: auto"></div>
    </div>

    <br>
    <div class="row">
        @if(Auth::user()->id != $post->user_id)
            <div class="col-md-4">
                <div class="well">
                        <p><b>Description:</b></p>
                        <p>{{$post->desc}}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="well">
                    {!! Form::open(['action' => 'BookingsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'files'=>true]) !!}
                    <div class="row">
                        <div class="form-group"> {{--start_date--}}
                            {{Form::label('start_date', 'Pickup Date:', ['class' => 'col-sm-4 col-form-label'])}}
                            <div class="col-md-12">
                                {{Form::date('start_date', \Carbon\Carbon::now())}} 
                            </div>
                        </div>
                        <div class="form-group"> {{--end_date--}}
                            {{Form::label('end_date', 'Dropoff Date:', ['class' => 'col-sm-4 col-form-label'])}}
                            <div class="col-md-12">
                                {{Form::date('end_date', \Carbon\Carbon::now())}} 
                            </div>
                        </div>
                        <input type='hidden' value='{{$post->id}}' name='post_id'>
                        <input type='hidden' value='{{$post->price}}' name='post_price'>
                        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="well center">
                        <a href="{!! route('messages.create', $post->user->id) !!}" class="btn btn-primary">Message {{$post->user->name}}</a>
                        <a href='/bookings/{{$post->id}}' class="btn btn-primary">View Unavailabilities</a>
                </div>
            </div>
        @else
            <div class="col-md-6">
                <div class="well">
                        <p><b>Description:</b></p>
                        <p>{{$post->desc}}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="well center">
                    <a href='/bookings/{{$post->id}}' class="btn btn-primary">View Unavailabilities</a>
                </div>
            </div>
        @endif
    </div>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
    <div class="center">
            <small><b>Created on {{$post->created_at}}</b> by <b>{{$post->user->name}}</b></small>
    </div>
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

