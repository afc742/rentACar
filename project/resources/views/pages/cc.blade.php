@extends('layouts.app')

@section('content')

<!--For adding credit card information for everyone-->

<div class = "container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add credit card</div>
                <div class="card-body">
                    <table style="width:100%">
                        {!! Form::open(['action' => 'CcController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <tr>
                            <td>
                                <div class = "form-group">{{--card_name--}}
                                    {{Form::label('card_name', 'Card Name:', ['class' => 'col-sm-4 col-form-label'])}}
                                        {{Form::text('card_name', '', ['class' => 'form-control', 'placeholder' => 'Card Name'])}}
                                </div>
                            </td>
                            <td>
                                <div class = "form-group">{{--card_number--}}
                                    {{Form::label('card_number', 'Card Number:', ['class' => 'col-sm-4 col-form-label'])}}
                                        {{Form::text('card_number', '', ['class' => 'form-control', 'placeholder' => 'Card Number'])}}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class = "form-group">{{--ccv--}}
                                    {{Form::label('ccv', 'CCV:', ['class' => 'col-sm-4 col-form-label'])}}
                                        {{Form::text('ccv', '', ['class' => 'form-control', 'placeholder' => 'CCV'])}}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class = "for-group">{{--expiry--}}
                                    {{Form::label('expiry', 'Expiry date:', ['class' => ''])}}
                                        {{Form::selectRange('month', 1, 12, ['class' => 'field'])}}
                                        {{Form::selectYear('year', 2000, 2020, ['class' => 'field'])}}
                                </div>
                            </td>
                            <td class="right">
                                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                            </td>
                        </tr>
                        {!! Form::close() !!}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection