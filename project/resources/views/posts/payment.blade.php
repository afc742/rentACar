@extends('layouts.app')

@section('content')

<div class="container">
    <div class = "container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Payment</div>
                        <div class="card-body">
                            <div class="form-group">
                                <h5>Price of booking: ${{$price}}</h5>
                                <h5>Include $35 fee to avoid excess? &nbsp;{{Form::checkbox('fee', 35, ['class' => 'field'])}}</h5>
                                <a href="{!! route('payment.index') !!}" class="btn btn-primary">Pay now</a>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

@endsection

