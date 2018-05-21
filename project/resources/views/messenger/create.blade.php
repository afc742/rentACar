@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create a new message</div>
                    <div class="card-body">
                        <form action="{{ route('messages.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="">
                                <!-- Subject Form Input -->
                                <div class="form-group">
                                    <label class="control-label">Subject</label>
                                    <input type="text" class="form-control" name="subject" placeholder="Subject"
                                        value="{{ old('subject') }}">
                                </div>

                                <!-- Message Form Input -->
                                <div class="form-group">
                                    <label class="control-label">Message</label>
                                    <textarea name="message" class="form-control">{{ old('message') }}</textarea>
                                </div>

                                <!-- Recipient_id -->
                                
                                <input type='hidden' value='{{$recipient_id}}' name='recipient'>

                        
                                <!-- Submit Form Input -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary form-control">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
