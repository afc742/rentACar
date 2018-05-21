@extends('layouts.app')

@section('content')

<!--For adding credit card information for everyone-->

<div class = "container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add credit card</div>
                <div class="card-body">
                    {!! Form::open(['action' => 'CcController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
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
                            {{Form::text('ccv', '', ['class' => 'form-control', 'placeholder' => 'CCV'])}}
                            </div>
                        </div>
                        <div class = "for-group">{{--expiry--}}
                        {{Form::label('expiry', 'Expiry date:', ['class' => ''])}}
                            <div class = "col-md-12">
                            {{Form::selectRange('month', 1, 12, ['class' => 'field'])}}
                            {{Form::selectYear('year', 2000, 2020, ['class' => 'field'])}}
                            </div>
                        </div>
                        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection