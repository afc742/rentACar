@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Inbox</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            @include('messenger.partials.flash')

                            @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
                        </table>
                    </div>
                </div>
            </div>
    </div>
    <br>
    {{$threads->links()}}
</div>
@stop
