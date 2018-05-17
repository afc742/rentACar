@extends('layouts.app')

@section('content')

<!--For adding credit card information for everyone-->

<div class = "container">
    <h1>Credit Card details</h1>
    {!! Form::open(['action' => 'CCController@', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class = "form-group row">
        <div class = "form-group">{{--card_name--}}
        {{Form::label('card_name', 'Card Name:', ['class' => 'col-sm-4 col-form-label'])}}
            <div class = "col-md-12">
            {{Form::text('card_name', '', ['class' => 'form-control', 'placeholder' => 'Card Name'])}}
            </div>
        </div>
        <div class = "form-group">{{--card_number--}}
        {{Form::label('card_number', 'Card Number:', ['class' => 'col-sm-4 col-form-label'])}}
            <div class = "col-md-12">
            {{Form::text('card_number', '', ['class' => 'form-control', 'placeholder' => 'Card Number'])}}
            </div>
        </div>
        <div class = "form-group">{{--ccv--}}
        {{Form::label('ccv', 'CCV:', ['class' => 'col-sm-4 col-form-label'])}}
            <div class = "col-md-12">
            {{Form::text('ccv', '', ['class' => 'form-control', 'placeholder' => CCV])}}
            </div>
        </div>
        <div class = "for-group">{{--expiry--}}
        {{Form::label('expiry', 'Expiry date:', ['class' => ''])}}
            <div class = "col-md-12">
            {{Form::selectMonth('month', 01, 12, ['class' => 'field'])}}
            {{Form::selectYear('year', 2000, 2020, ['class' => 'field'])}}
            </div>
        </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>