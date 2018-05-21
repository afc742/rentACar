<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<head>
    
</head>
<body class= "fb">
        <div class ="container" style="padding-top: 18%">
                <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Share this listing with your friends!</div>
                        <div class="card-body">
                        <h5>{{$year}} - {{$make}} {{$model}}</h5>
                        <img style="width: 160px; float:right; margin-bottom: 20px; margin-right: 10px;" src="/storage/car_images/{{$car_img}}">
                        <div class="well col-md-8"<p>{{$desc}}</p></div>
                                <a href="/posts/{{$post_id}}" class="btn btn-primary">Back</a>
                                <a href="/posts/{{$post_id}}" class="btn btn-primary">Post!</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>