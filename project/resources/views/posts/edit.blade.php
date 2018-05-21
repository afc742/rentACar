@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Edit Listing</h1>
    <hr>
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'files'=>true]) !!}
    <div class="row">
        <div class="form-group"> {{--make--}}
            {{Form::label('make', 'Make:', ['class' => 'col-sm-4 col-form-label'])}}
            <div class="col-md-12">
                {{Form::text('make', $post->make, ['class' => 'form-control', 'placeholder' => 'Make'])}} 
            </div>
        </div>
        <div class="form-group"> {{--model--}}
            {{Form::label('model', 'Model:', ['class' => 'col-sm-4 col-form-label'])}}
            <div class="col-md-12">
                {{Form::text('model', $post->model, ['class' => 'form-control', 'placeholder' => 'Model'])}} 
            </div>
        </div>
        <div class="form-group"> {{--year--}}
            {{Form::label('year', 'Year:', ['class' => ''])}}
            <div class="col-md-12">
                {{Form::selectYear('year', 2000, 2020, ['class' => 'field', 'selected' => $post->year])}} 
            </div>
        </div>
        <div class="form-group"> {{--type--}}
            {{Form::label('type', 'Type:', ['class' => ''])}}
            <div class="col-md-12">
                {{Form::select('type', ['Sedan' => 'Sedan', 'Hatchback' => 'Hatchback', 'MPV' => 'MPV', 'SUV' => 'SUV', 'Van' => 'Van', 'Crossover' => 'Crossover', 'Coupe' => 'Coupe', 'Convertible' => 'Convertible', 'Ute' => 'Ute', 'Truck' => 'Truck'], ['class' => 'field', 'selected' => $post->type])}} 
            </div>
        </div>
        
        <div class="form-group"> {{--seats--}}
            {{Form::label('seats', 'Seats:', ['class' => ''])}}
            <div class="col-md-12">
                {{Form::selectRange('seats', 1, 8, ['class' => 'field', 'selected' => $post->seats])}} 
            </div>
        </div>
        <div class="form-group"> {{--doors--}}
            {{Form::label('doors', 'Doors:', ['class' => ''])}}
            <div class="col-md-12">
                {{Form::selectRange('doors', 1, 8, ['class' => 'field', 'selected' => $post->doors])}} 
            </div>
        </div>
        <div class="form-group"> {{--trans--}}
            {{Form::label('trans', 'Transmission:', ['class' => ''])}}
            <div class="col-md-12 row">
                {{Form::radio('trans', 'Automatic', ['class' => 'field'])}}
                <p>Automatic</p> 
            </div>
            <div class="col-md-12 row">
                {{Form::radio('trans', 'Manual', ['class' => 'field'])}}
                <p>  Manual</p>  
            </div>
        </div>
        <div class="form-group"> {{--pets?--}}
            {{Form::label('petF', 'Pet friendly?:', ['class' => ''])}}
            <div class="col-md-12 row">
                {{Form::radio('petF', 1, ['class' => 'field'])}}
                <p>Yes</p> 
            </div>
            <div class="col-md-12 row">
                {{Form::radio('petF', 0, ['class' => 'field'])}}
                <p>  No</p>  
            </div>
        </div>
        <div class="form-group"> {{--roof racks?--}}
            {{Form::label('roof_r', 'Roof racks?:', ['class' => ''])}}
            <div class="col-md-12 row">
                {{Form::radio('roof_r', 1, ['class' => 'field'])}}
                <p>Yes</p> 
            </div>
            <div class="col-md-12 row">
                {{Form::radio('roof_r', 0, ['class' => 'field'])}}
                <p>  No</p>  
            </div>
        </div>
        <div class="form-group"> {{--price--}}
            {{Form::label('price', 'Price:', ['class' => 'col-sm-4 col-form-label'])}}
            <div class="col-md-12">
                {{Form::text('price', 'price', ['class' => 'form-control', 'placeholder' => 'Price'])}} 
            </div>
        </div>
        <div class="form-group"> {{--odometer--}}
            {{Form::label('odometer', 'Odometer:', ['class' => 'col-sm-4 col-form-label'])}}
            <div class="col-md-12">
                {{Form::text('odometer', 'odometer', ['class' => 'form-control', 'placeholder' => 'Odometer'])}} 
            </div>
        </div>
    </div>
    <div class="form-group"> {{--map search bar--}}
        {{Form::label('', 'Location:', ['class' => ''])}}
        {{Form::text('location', $post->location, [ 'id' => 'searchmap', 'class' => 'form-control', 'placeholder' => 'Address'])}}
    </div>
        
    <div id="map-canvas" style="width: 1100px; height: 300px; margin: auto"></div> {{--map--}}
    <br>

    <div class="form-group"> {{--lat--}}
        {{Form::label('lat', 'Latitude:', ['class' => ''])}}
        {{Form::text('lat', $post->lat, [ 'id' => 'lat', 'class' => 'form-control input-sm', 'placeholder' => 'Latitude', 'readonly' => 'true'])}}
    </div>

    <div class="form-group">{{--lng--}}
        {{Form::label('lng', 'Longitude:', ['class' => ''])}}
        {{Form::text('lng', $post->lng, [ 'id' => 'lng', 'class' => 'form-control input-sm', 'placeholder' => 'Longitude', 'readonly' => 'true'])}}
    </div>

    <div class="form-group"> {{--desc--}}
        {{Form::label('desc', 'Description:', ['class' => ''])}}
        <div class="">
            {{Form::textArea('desc', $post->desc, ['class' => 'form-control', 'placeholder' => '...Desc'])}}
        </div>
    </div>
    <div class="form-group"> {{--img--}}
        <div class="">
            {{Form::file('car_img')}}
        </div>
    </div>
    <hr>
    <div class="right">
            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
    <div class="center">
            <small><b>Created on {{$post->created_at}}</b> by <b>{{$post->user->name}}</b></small>
    </div>
    <br>
    <br>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlTjBH4hS_0AL3W0L4lpz24mR0HVZILDc&libraries=places" type="text/javascript"></script>
<script>
    var lat = {{$post->lat}};
    var lng = {{$post->lng}};
	var map = new google.maps.Map(document.getElementById('map-canvas'),{
		center:{
            lat,
            lng
		},
		zoom:15
	});
	var marker = new google.maps.Marker({
		position: {
			lat,
        	lng
		},
		map: map,
		draggable: true
	});
	var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
	google.maps.event.addListener(searchBox,'places_changed',function(){
		var places = searchBox.getPlaces();
		var bounds = new google.maps.LatLngBounds();
		var i, place;
		for(i=0; place=places[i];i++){
  			bounds.extend(place.geometry.location);
  			marker.setPosition(place.geometry.location); 
  		}
  		map.fitBounds(bounds);
  		map.setZoom(15);
	});
	google.maps.event.addListener(marker,'position_changed',function(){
		var lat = marker.getPosition().lat();
		var lng = marker.getPosition().lng();
		$('#lat').val(lat);
		$('#lng').val(lng);
	});
</script>
@endsection
