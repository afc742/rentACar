@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                <hr><hr>
                    <h3>Your listings</h3>
                    @if(count($posts) > 0)
                        <table class="table table-striped">
                            @foreach($posts as $post)
                            <tr>
                                <td>{{$post->make}} {{$post->model}}</td>
                                <td><a href="/posts/{{$post->id}}/edit" class="btn btn-primary right">Edit</a></td>
                                <td></td>
                            </tr>
                            @endforeach
                        </table>
                    @else
                        <p>You have no vehicles listed for rent!</p>
                    @endif    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
