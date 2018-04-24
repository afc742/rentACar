@extends('layouts.app')
@section('content')
<div class="container">
<<<<<<< HEAD
    <div class="jumbotron text-center">
        <h1> FAQ </h1>
=======
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('FAQ') }}</div>
                    <div class="card-body">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapse1">
                                        Question 1</a>
                                    </h4>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse in" data-parent="#accordion">
                                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                    minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                    commodo consequat.</div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapse2">
                                        Question 2</a>
                                    </h4>
                                </div>
                                <div id="collapse2" class="panel-collapse collapse" data-parent="#accordion">
                                <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                commodo consequat.</div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapse3">
                                        Question 3</a>
                                    </h4>
                                </div>
                                <div id="collapse3" class="panel-collapse collapse" data-parent="#accordion">
                                <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                commodo consequat.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
>>>>>>> 4470f9da143ea751747e06dd8d409ddbde0d9545
    </div>
</div>
@endsection
