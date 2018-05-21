@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Welcome back {{Auth::user()->name}}!</div>
                <div class="card-body">
                    <br>
                    <h3>Your listings</h3>
                    <table class="table table-striped">
                        @if(count($posts) > 0)
                            @foreach($posts as $post)
                            <tr>
                                <td><b>{{$post->make}} {{$post->model}}</b> : listed on {{$post->created_at}} </td>
                                <td><a href="/posts/{{$post->id}}/edit" class="btn btn-primary right">Edit</a></td>
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
                </div>
            </div>
        </div>
    </div>
<br><br><hr><br><br>
</div>
@endsection
