@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/messages" class="btn btn-primary">Go Back</a>
    <br><br>
    <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>{{ $thread->subject }}<h3></div>
                    <div class="card-body">
                    <br>
                        <div class="">
                            @each('messenger.partials.messages', $thread->messages, 'message')

                            @include('messenger.partials.form-message')
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@stop
