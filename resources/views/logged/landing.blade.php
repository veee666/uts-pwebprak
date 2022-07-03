@extends('template.structure_logged')

@section('content')

<div class="container">
    <div class="main">
        <div class="images">
        <section class="banner">
            Plan your Fitness Lesson and Get Your Ideal Body
            <h4>Become a member and create your first ever fitness plan with our professional trainer. Reach your ideal body in no time!</h4>
        </section>
    </div>
    </div>
    <div class="card-container">
        <div class="card-heading content-1">
            <h4>20</h4>
            <h3>Years Experience</h3>
        </div>
        <div class="card-heading content-2">
            <h4>+10K</h4>
            <h3>Happy Customers</h3>
        </div>
        <div class="card-heading content-3">
            <h4>80</h4>
            <h3>Expert Trainer</h3>
        </div>
    </div>
    <div class="feature-container">
        <div class="bg-image">
            <section class="feature-title">
                <h1>Explore Our Programs</h1>
                <h4>Check out our most popular training programs!</h4>
            </section>
            <div class="card-row">
            <div class="card-feature">
                <div class="card-content">
                    <img src="asset/img/barbell.svg" alt="Strength Training">
                    <h3>Strength Training</h3>
                    <p>In this program, you are trained to improve your strength through series of exercise.</p>
                    <button class="btn-primary">Learn More</button>
                </div>
            </div>
            <div class="card-feature">
                <div class="card-content">
                    <img src="asset/img/exercise.svg" alt="Cardio Training">
                    <h3>Cardio Training</h3>
                    <p>In cardio training program you are trained to do sequential moves in range of 20 until 30 minutes.</p>
                    <button class="btn-primary">Learn More</button>
                </div>
            </div>
            <div class="card-feature">
                <div class="card-content">
                    <img src="asset/img/fire.svg" alt="Fat Burning">
                    <h3>Fat Burning</h3>
                    <p>This program is suitable for you who wants to get rid of your fats and lose their weight.</p>
                    <button class="btn-primary">Learn More</button>
                </div>
            </div>
            <div class="card-feature">
                <div class="card-content">
                    <img src="asset/img/pulse.svg" alt="Health Fitness">
                    <h3>Health Fitness</h3>
                    <p>This porgram is designed for those who exercises only for their body fitness and not body building.</p>
                    <button class="btn-primary">Learn More</button>
                </div>
            </div>
            </div>
        </div>
        


    </div>
    <div class="benefit-container">
            <div class="bg-benefit">
                <div class="benefit-content">
                <section class="benefit-title">
                    <h1>Why Choose Us?</h1>
                    <h4>We offer the upmost services, programs, trainers that will
                        fit the clients most, so you don’t have to worry about
                        what diet you’ll be doing while doing the program, because
                        our professional trainers got that covered!</h4>
                </section>
                <div class="list-benefit">
                    <ul class="list-content">
                        <li><img src="asset/img/check.svg" alt="check"></li>
                        <li><h4 class="list-text">Over 80+ Expert Coaches</h4></li>
                    </ul>
                    <ul class="list-content">
                        <li><img src="asset/img/check.svg" alt="check"></li>
                        <li><h4 class="list-text">Train Smarter and Faster than Before</h4></li>
                    </ul>
                    <ul class="list-content">
                        <li><img src="asset/img/check.svg" alt="check"></li>
                        <li><h4 class="list-text">More than 30+ Rental Facilities</h4></li>
                    </ul>
                    <ul class="list-content">
                        <li><img src="asset/img/check.svg" alt="check"></li>
                        <li><h4 class="list-text">Reliable Partners</h4></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="plan-container">
        <div class="bg-plan">
            <section class="plan-title">
                <h1>Get Started with Our Favourite Plans</h1>
                <h4>Make your plans and enjoy the benefits of becoming a member!</h4>
            </section>
            
            <div class="plan-row">
                @foreach($subs as $sub)
                        @if($sub->id%2 != 0)
                            <div class="plan-column-other">
                        @else
                            <div class="plan-column">
                        @endif
                    <div class="plan-content">
                        @if($sub->nama_paket == 'Basic Plan')
                        <img src="asset/img/health.svg" alt="Basic Plan">
                        @elseif($sub->nama_paket == 'Premium Plan')
                        <img src="asset/img/crown.svg" alt="Premium Plan">
                        @else
                        <img src="asset/img/barbell.svg" alt="Pro Plan">
                        @endif
                    <h3>{{ $sub->nama_paket }}</h3>
                    <h2>Rp.{{ $sub->harga_paket }}</h2>
                    
                    @if($sub->id%2 != 0)
                    <div class="list-plan">
                        <ul class="plan-list">
                            <li><img src="asset/img/check-pink.svg" alt="check"></li>
                            <li><h4 class="plan-text">Over 80+ Expert Coaches</h4></li>
                        </ul>
                        <ul class="plan-list">
                            <li><img src="asset/img/check-pink.svg" alt="check"></li>
                            <li><h4 class="plan-text">Train Smarter and Faster than Before</h4></li>
                        </ul>
                        <ul class="plan-list">
                            <li><img src="asset/img/check-pink.svg" alt="check"></li>
                            <li><h4 class="plan-text">More than 30+ Rental Facilities</h4></li>
                        </ul>
                        <ul class="plan-list">
                            <li><h4 class="plan-text">See more benefits</h4></li>
                        </ul>
                    </div>
                    @if (Auth::user()->subs_id == NULL)
                    <form method="get" action="{{ route('form.subs',$sub->id) }}">
                        <button type="submit" class="btn-secondary">Join Now</button>
                    </form>
                    @else
                    <button class="btn-secondary">You have subscribed to {{ Auth::user()->subs->nama_paket }}</button>
                    
                    @endif
                    @else
                    <div class="list-plan">
                        <ul class="plan-list">
                            <li><img src="asset/img/check.svg" alt="check"></li>
                            <li><h4 class="plan-text">Over 80+ Expert Coaches</h4></li>
                        </ul>
                        <ul class="plan-list">
                            <li><img src="asset/img/check.svg" alt="check"></li>
                            <li><h4 class="plan-text">Train Smarter and Faster than Before</h4></li>
                        </ul>
                        <ul class="plan-list">
                            <li><img src="asset/img/check.svg" alt="check"></li>
                            <li><h4 class="plan-text">More than 30+ Rental Facilities</h4></li>
                        </ul>
                        <ul class="plan-list">
                            <li><h4 class="plan-text">See more benefits</h4></li>
                        </ul>
                    </div>
                    @if (Auth::user()->subs_id == NULL)
                    <form method="get" action="{{ route('form.subs',$sub->id) }}">
                        <button type="submit" class="btn-primary">Join Now</button>
                    </form>
                    @else
                    <button class="btn-primary">You have subscribed to {{ Auth::user()->subs->nama_paket }}</button>
                    @endif
                    @endif                    
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</div>
</div>
        

@endsection


