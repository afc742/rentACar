@extends('layouts.app')

@section('content')

<div class="container">
    <a href="/posts/{{$post_id}}" class="btn btn-primary">Go Back</a>
    <br><br>
    <h3>Reservations</h3>
    <hr>
    @if(count($bookings) > 0)
        <div class="container-fluid">
                @foreach($bookings as $booking)
                        <div class="well">
                                <div class="text-center">
                                    <h4><b>{{$booking->start_date}}</b> until the <b>{{$booking->end_date}}</b></h4>
                                </div>
                        </div>
                @endforeach
        </div>
    @else
        <p>No posts</p>
    @endif
    <hr>
    {{$bookings->links()}}
</div>
@endsection

