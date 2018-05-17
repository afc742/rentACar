@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Create Listing</h1>
    <hr>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'files'=>true]) !!}
    <div class="row">
        <div class="form-group"> {{--make--}}
            {{Form::label('make', 'Make:', ['class' => 'col-sm-4 col-form-label'])}}
            <div class="col-md-12">
                {{Form::text('make', '', ['class' => 'form-control', 'placeholder' => 'Make'])}} 
            </div>
        </div>
        <div class="form-group"> {{--model--}}
            {{Form::label('model', 'Model:', ['class' => 'col-sm-4 col-form-label'])}}
            <div class="col-md-12">
                {{Form::text('model', '', ['class' => 'form-control', 'placeholder' => 'Model'])}} 
            </div>
        </div>
        <div class="form-group"> {{--year--}}
            {{Form::label('year', 'Year:', ['class' => ''])}}
            <div class="col-md-12">
                {{Form::selectYear('year', 2000, 2020, ['class' => 'field'])}} 
            </div>
        </div>
        <div class="form-group"> {{--type--}}
            {{Form::label('type', 'Type:', ['class' => ''])}}
            <div class="col-md-12">
                {{Form::select('type', ['Sedan' => 'Sedan', 'Hatchback' => 'Hatchback', 'MPV' => 'MPV', 'SUV' => 'SUV', 'Van' => 'Van', 'Crossover' => 'Crossover', 'Coupe' => 'Coupe', 'Convertible' => 'Convertible', 'Ute' => 'Ute', 'Truck' => 'Truck'], ['class' => 'field'])}} 
            </div>
        </div>
        
        <div class="form-group"> {{--seats--}}
            {{Form::label('seats', 'Seats:', ['class' => ''])}}
            <div class="col-md-12">
                {{Form::selectRange('seats', 1, 8, ['class' => 'field'])}} 
            </div>
        </div>
        <div class="form-group"> {{--doors--}}
            {{Form::label('doors', 'Doors:', ['class' => ''])}}
            <div class="col-md-12">
                {{Form::selectRange('doors', 1, 8, ['class' => 'field'])}} 
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
    </div>
    <div class="form-group"> {{--map search bar--}}
        {{Form::label('', 'Location:', ['class' => ''])}}
        {{Form::text('location', '', [ 'id' => 'searchmap', 'class' => 'form-control', 'placeholder' => 'Address'])}}
    </div>
        
    <div id="map-canvas" style="width: 1100px; height: 300px; margin: auto"></div> {{--map--}}
    <br>

    <div class="form-group"> {{--lat--}}
        {{Form::label('lat', 'Latitude:', ['class' => ''])}}
        {{Form::text('lat', '', [ 'id' => 'lat', 'class' => 'form-control input-sm', 'placeholder' => 'Latitude'])}}
    </div>

    <div class="form-group">{{--lng--}}
        {{Form::label('lng', 'Longitude:', ['class' => ''])}}
        {{Form::text('lng', '', [ 'id' => 'lng', 'class' => 'form-control input-sm', 'placeholder' => 'Longitude'])}}
    </div>

    <div class="form-group"> {{--desc--}}
        {{Form::label('desc', 'Description:', ['class' => ''])}}
        <div class="">
            {{Form::textArea('desc', '', ['class' => 'form-control', 'placeholder' => '...Desc'])}}
        </div>
    </div>
    <div class="form-group"> {{--img--}}
        <div class="">
            {{Form::file('car_img')}}
        </div>
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlTjBH4hS_0AL3W0L4lpz24mR0HVZILDc&libraries=places" type="text/javascript"></script>
<script>
	var map = new google.maps.Map(document.getElementById('map-canvas'),{
		center:{
            lat: -34.4278121,
            lng: 150.89306069999998
		},
		zoom:15
	});
	var marker = new google.maps.Marker({
		position: {
			lat: -34.4278121,
        	lng: 150.89306069999998
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
