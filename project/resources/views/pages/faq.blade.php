@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h3><b><div class="card-header">{{ __('FAQ') }}</div></b></h3>
                    <div class="card-body">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapse1">
                                        Am I eligible to join CarApp?</a>
                                    </h4>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse in" data-parent="#accordion">
                                    <div class="panel-body">To be eligile to join CarApp you must: 
                                    <ul><li>Be at least 18 years old</li>
                                    <li>Hold a full unrestricted license</li>
                                    <li>Have a valid email address</li>
                                    <li>Have a credit or debit card</li></ul></div>
                                </div>
                            </div>
                            <br>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapse2">
                                        What kind of cars are available? Do you have automatic and manual?</a>
                                    </h4>
                                </div>
                                <div id="collapse2" class="panel-collapse collapse" data-parent="#accordion">
                                <div class="panel-body">All kinds of cars are available here at CarApp, from utes, vans and 4WDs, 
                                to small cars and luxury cars. Both automatic and manual are accessible. To find the right fit
                                for you simply use our <i>filters</i> feature on the search page.</div>
                                </div>
                            </div>
                            <br>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapse3">
                                        What if I need to make a complaint?</a>
                                    </h4>
                                </div>
                                <div id="collapse3" class="panel-collapse collapse" data-parent="#accordion">
                                <div class="panel-body">If you have a complaint about anything please contact us 
                                by calling or emailing us at <a href = "mailto:complaints@carapp.com.au">complaints@carapp.com.au</a>.
                                 We will record the details of the complaint and keep you informed of the progress.</div>
                                </div>
                            </div>
                            <br>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapse4">
                                        Can I take my pet in the car?</a>
                                    </h4>
                                </div>
                                <div id="collapse4" class="panel-collapse collapse" data-parent="#accordion">
                                <div class="panel-body">Pet friendly cars are available if the owner has chosen this as a feature of their
                                 listing. If you would like to search for only pet friendly cars please use our <i>filters</i> feature on the search page.</div>
                                </div>
                            </div>
                            <br>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapse5">
                                        How do I book a car?</a>
                                    </h4>
                                </div>
                                <div id="collapse5" class="panel-collapse collapse" data-parent="#accordion">
                                <div class="panel-body">First, you must sign up and be approved for a CarApp account, it's simple and free and only takes a few minutes. 
                                Once you've been apporved simply search our wide selection of vehicles and choose a timeframe that suits you for your booking. 
                                A confirmation email will be sent to you and you will receive a pickup location and lockbox code to access the vehicle. There's no need 
                                to meet owners, simply book and drive.</div>
                                </div>
                            </div>
                            <br>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapse6">
                                        How do I cancel or change a booking?</a>
                                    </h4>
                                </div>
                                <div id="collapse6" class="panel-collapse collapse" data-parent="#accordion">
                                <div class="panel-body">You can cancel or change start/finish times of any booking through your account page. Simply go to your bookings 
                                and click <i>edit</i> on the trip you wish to change. 
                                <i><b>Please be aware that fees may apply for cancelling or changing a trip.</b></i></div>
                                </div>
                            </div>
                            <br>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapse7">
                                        How do I access the car once I've made a booking?</a>
                                    </h4>
                                </div>
                                <div id="collapse7" class="panel-collapse collapse" data-parent="#accordion">
                                <div class="panel-body">Once you've made a booking an exact location and a lockbox code will be sent to you. The lockbox will be located 
                                on the cars window and all that you need to do is enter the code given to receive the keys to the car. Before you drive please remember to 
                                check for a full tank of fuel and record any damages and take photos of every part of the car. This will protect you if damages are found 
                                later that you have not caused.</div>
                                </div>
                            </div>
                            <br>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapse8">
                                        How do I end my booking? What do I do?</a>
                                    </h4>
                                </div>
                                <div id="collapse8" class="panel-collapse collapse" data-parent="#accordion">
                                <div class="panel-body">When you need to return the car simply return and park in the location specified by the owner 
                                with a full tank of fuel. You then must take another set of photos that clearly show every part of the car and reinstall 
                                the lockbox with the keys inside. Remember to check you have taken all of your belongings from the car and that all the 
                                windows and doors are secure. Once you have successfully returned the car hit the <i>end booking</i> button to complete the booking.</div>
                                </div>
                            </div>
                            <br>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapse9">
                                        Am I covered by insurance when I borrow cars?</a>
                                    </h4>
                                </div>
                                <div id="collapse9" class="panel-collapse collapse" data-parent="#accordion">
                                <div class="panel-body">When booking cars through CarApp you are covered by our comprehensive insurance. If you damage a car 
                                and haven't violated any term agreements you will only need to pay an excess fee of $1000. If you would like to avoid an excess 
                                fee, an additional $35 fee will need to be paid on top of your rental fee upon booking. Please contact our claims department for any 
                                inquiries.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
