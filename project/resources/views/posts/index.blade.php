@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Posts</h1>
    <hr>
    <div class="form-group">
        {{Form::text('', '', [ 'id' => 'searchmap', 'class' => 'form-control', 'placeholder' => 'Search for cars near you!'])}}
    </div>
    <div id="map-canvas" style="width: 1100px; height: 300px; margin: auto"></div>
    <br>

    {!! Form::open(['action' => 'PostsController@search', 'method' => 'GET', 'enctype' => 'multipart/form-data', 'files'=>true]) !!}
    <div class="row well" style="margin: auto">
        <div class = "col-md-3"> 
            <div class="form-group right"> {{--pets?--}}
                {{Form::label('petF', 'Pet friendly?:', ['class' => ''])}}
                    {{Form::checkbox('petF', 1, false,['class' => 'field'])}}
            </div>
        </div>
        <div class = "col-md-3"> 
            <div class="form-group right"> {{--roof racks?--}}
                {{Form::label('roof_r', 'Roof racks?:', ['class' => ''])}} 
                    {{Form::checkbox('roof_r', 1, false,['class' => 'field'])}}   
            </div>
        </div>
        <div class = "col-md-3">   
            <div class="form-group"> {{--trans--}}
                <div class="right" stlye="margin-right: 6px">
                    {{Form::radio('trans', 'Automatic', ['class' => 'field'])}}
                    <p>A</p> 
                </div>
                <div class="right" style="margin-right: 20px">
                    {{Form::radio('trans', 'Manual', ['class' => 'field'])}}
                    <p>  M</p>  
                </div>
                <p class="right" style="margin-right: 20px">Transmition:</p>
            </div>
        </div>
        <div class = "col-md-3">
            <div class="form-group center">
                {{Form::submit('Search', ['class' => 'btn btn-primary'])}}
                {!! Form::close() !!}
                <a href="/posts" class="btn btn-primary">All</a>
            </div>
        </div>
    </div>
    <br>
    
    
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
                                <small><b>Created on {{$post->created_at}}</b> by <b>{{$post->user->name}}</b></small>
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
    <br><br><hr><br><br>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlTjBH4hS_0AL3W0L4lpz24mR0HVZILDc&libraries=places" type="text/javascript"></script>
<script>
        var lat;
        var lng;
        var link;
        var map = new google.maps.Map(document.getElementById('map-canvas'),{
            center:{
            lat: -34.4278121,
        	lng: 150.89306069999998
            },
            zoom: 9
        });
        @foreach($posts as $post)
            link = "/posts/" + {{$post->id}}
            var place = [{{$post->lat}}, {{$post->lng}}, link];
            var windowContent = "<div style='float:left'><img src='/storage/car_images/{{$post->car_img}}' width= 60px></div><div style='float:right; padding: 10px;'><h3>{{$post->make}} {{$post->model}}</h3></div>";
            var myinfowindow = new google.maps.InfoWindow({
            content: windowContent
            });
            var marker = new google.maps.Marker({
                position:{
                lat: place[0],
                lng: place[1]
                },
                link: place[2],
                map:map,
                infowindow: myinfowindow
            });
            google.maps.event.addListener(marker, 'mouseover', function() {
                this.infowindow.open(map, this);
            });
            google.maps.event.addListener(marker, 'mouseout', function() {
                this.infowindow.close(map, this);
            });
            google.maps.event.addListener(marker, 'click', function() {
                window.location.href = this.link;
            });
        @endforeach;
        var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
	    google.maps.event.addListener(searchBox,'places_changed',function(){
		var places = searchBox.getPlaces();
		var bounds = new google.maps.LatLngBounds();
		var i, place;
		for(i=0; place=places[i];i++){
  			bounds.extend(place.geometry.location);
  		}
  		map.fitBounds(bounds);
  		map.setZoom(15);
	});
</script>

@endsection