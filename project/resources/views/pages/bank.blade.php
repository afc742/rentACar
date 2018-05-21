@extends('layouts.app')

@section('content')

<!--For adding banking details for owners-->

<div class = "container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add bank account</div>
                <div class="card-body">
                    {!! Form::open(['action' => 'BankController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class = "form-group row">
                        <div class = "form-group"> {{--bsb--}}
                        {{Form::label('bsb', 'BSB:', ['class' => 'col-sm-4 col-form-label'])}}
                            <div class= "col-md-12">
                            {{Form::text('bsb', '', ['class' => 'form-control', 'placeholder' => 'BSB'])}}
                            </div>
                        </div>
                        <div class = "form-group"> {{--account_number--}}
                        {{Form::label('account_number', 'Account Number:', ['class' => 'col-sm-4 col-form-label'])}}
                            <div class = "col-md-12">
                            {{Form::text('account_number', '', ['class' => 'form-control', 'placeholder' => 'Account Number'])}}
                            </div>
                        </div>
                    </div>
                    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection