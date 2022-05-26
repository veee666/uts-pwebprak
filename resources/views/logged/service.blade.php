@extends('template.structure_logged')

@section('content')

    <div class="container-service">
        <div class="main-service">
            <div class="bg-service">
            <section class="banner-service">
                <img src="asset/img/service-pic-1.png" alt="prog-img">
                <div class="service-content">
                Take a Look at Our Favorite Programs
                <h4>Be sure to check out and sign yourself in to join our programs and achieve your ideal body with our professionals!</h4>
            </div> 
            </section>
            </div>
        </div>
        <div class="programs-container">
            <div class="bg-image">
                <section class="service-title">
                    <h1>Explore Our Programs</h1>
                    <h4>Check out our most popular training programs!</h4>
                </section>
                <div class="card-row">
                <div class="card-service">
                    <div class="card-content">
                        <img src="asset/img/stadium.svg" alt="Facility Renting">
                        <h3>Facility Renting</h3>
                        <p>In this program, you are trained to improve your strength through series of exercise.</p>
                        <button class="btn-primary">Learn More</button>
                    </div>
                </div>
                <div class="card-service">
                    <div class="card-content">
                        <img src="asset/img/exercise.svg" alt="Personal Trainer">
                        <h3>Personal Trainer</h3>
                        <p>In cardio training program you are trained to do sequential moves in range of 20 until 30 minutes.</p>
                        <button class="btn-primary">Learn More</button>
                    </div>
                </div>
                <div class="card-service">
                    <div class="card-content">
                        <img src="asset/img/store.svg" alt="Shops">
                        <h3>Shops</h3>
                        <p>This program is suitable for you who wants to get rid of your fats and lose their weight.</p>
                        <button class="btn-primary">Learn More</button>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>

@endsection