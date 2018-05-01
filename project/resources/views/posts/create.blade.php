@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Listing</h1>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
    <div class="form-group row">
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
    </div>
        <div class="form-group"> {{--year--}}
            {{Form::label('year', 'Year:', ['class' => ''])}}
            <div class="">
                {{Form::selectYear('year', 2000, 2020, ['class' => 'field'])}} 
            </div>
        </div>
        <div class="form-group"> {{--type--}}
            {{Form::label('type', 'Type:', ['class' => ''])}}
            <div class="">
                {{Form::select('type', ['Sedan' => 'Sedan', 'Hatchback' => 'Hatchback', 'MPV' => 'MPV', 'SUV' => 'SUV', 'Van' => 'Van', 'Crossover' => 'Crossover', 'Coupe' => 'Coupe', 'Convertible' => 'Convertible', 'Ute' => 'Ute', 'Truck' => 'Truck'], ['class' => 'field'])}} 
            </div>
        </div>
        <div class="form-group"> {{--trans--}}
            {{Form::label('trans', 'Transmission:', ['class' => ''])}}
            <div class="col-md-4 row">
                {{Form::radio('trans', 'Automatic', ['class' => 'field'])}}
                <p>Automatic</p> 
            </div>
            <div class="col-md-4 row">
                {{Form::radio('trans', 'Manual', ['class' => 'field'])}}
                <p>  Manual</p>  
            </div>
        </div>
        <div class="form-group"> {{--seats--}}
            {{Form::label('seats', 'Seats:', ['class' => ''])}}
            <div class="">
                {{Form::selectRange('seats', 1, 8, ['class' => 'field'])}} 
            </div>
        </div>
        <div class="form-group"> {{--doors--}}
            {{Form::label('doors', 'Doors:', ['class' => ''])}}
            <div class="">
                {{Form::selectRange('doors', 1, 8, ['class' => 'field'])}} 
            </div>
        </div>
        <div class="form-group"> {{--desc--}}
            {{Form::label('desc', 'Description:', ['class' => ''])}}
            <div class="">
                {{Form::textArea('desc', '', ['class' => 'form-control', 'placeholder' => '...Desc'])}}
            </div>
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection