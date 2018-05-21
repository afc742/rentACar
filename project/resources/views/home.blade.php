@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Welcome back {{Auth::user()->name}}!</div>
                <div class="card-body">
                    <br><br>
                    <table class="table">
                        <tr>
                            @if(!$card)
                                <td><a href="{!! route('cc.create') !!}"><div class="well blue text-white center">Please add a credit card in order to complete bookings</div></a></td>
                            @endif
                            @if(!$bank)
                                <td><a href="{!! route('bank.create') !!}"><div class="well blue text-white center">A bank account is required in order to list your vehicle</div></a></td>
                            @endif        
                        </tr>
                    </table>
                    <h3>Your listings</h3>
                    <table class="table table-striped">
                        @if(count($posts) > 0)
                            @foreach($posts as $post)
                            <tr>
                                <td><b>{{$post->make}} {{$post->model}}</b> : listed on {{$post->created_at}} </td>
                                <td><a href="/posts/{{$post->id}}/edit" class="btn btn-info right">Edit</a></td>
                                <td><a href="/posts/{{$post->id}}" class="btn btn-primary right">View</a></td>
                            </tr>
                            @endforeach
                        @else
                            <br>
                            <td>You have no vehicles listed for rent!</td>
                        @endif
                    </table>
                    <h3>Your bookings</h3>
                    <table class="table table-striped">
                        @if(count($bookings) > 0)
                            @foreach($bookings as $booking)
                            <tr>
                                <td><b>Booking Date:</b> {{$booking->start_date}} unitl the {{$booking->end_date}}</td>
                                <td><a href="/posts/{{$booking->post_id}}" class="btn btn-primary right">View</a></td>
                            </tr>
                            @endforeach
                            </table>
                        @else
                            <br>
                            <td>You have no vehicle reservations!</td>
                            </table>
                        @endif 
                        @if($card)
                            {!!Form::open(['action' => ['CcController@destroy', $card->id], 'onclick' => 'return confirm("Are you sure?")', 'method' => 'POST', 'class' => 'float-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Remove credit card', ['class' => 'btn btn-primary'])}}
                            {!!Form::close()!!}
                        @endif
                        @if($bank)
                            {!!Form::open(['action' => ['BankController@destroy', $bank->id], 'onclick' => 'return confirm("Are you sure?")','style' => 'margin-right: 6px', 'method' => 'POST', 'class' => 'float-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Remove bank account', ['class' => 'btn btn-primary'])}}
                            {!!Form::close()!!}
                        @endif
                </div>
            </div>
        </div>
    </div>
<br><br><hr><br><br>
</div>

@endsection
