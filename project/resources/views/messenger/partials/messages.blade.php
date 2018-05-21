<div class="container">
    <div class="row">
        @if(Auth::user()->id == $message->user_id)
            <div class="col-md-1">
            </div>
            <div class="col-md-11">
                <div class="well blue">
                    <div class="text-white">
                        <b><p >{{ $message->body }}</p></b>
                            <div class="">
                                <small>Posted {{ $message->created_at->diffForHumans() }}</small>
                            </div>            
                    </div>
                </div>
            </div>
        @else
            <div class="col-md-11">
                <div class="well">
                    <div class="">
                        <b><p>{{ $message->body }}</p></b>
                            <div class="">
                                <small>Posted {{ $message->created_at->diffForHumans() }}</small>
                            </div>            
                    </div>
                </div>
            </div>
            <div class="col-md-1">
            </div>
        @endif
    </div>
</div>