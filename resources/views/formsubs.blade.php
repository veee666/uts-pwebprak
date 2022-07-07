@extends('template.structure_admin')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<link href="/css/dashboard.css" rel="stylesheet">

@section('content')
    <div class="container-regist">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card-regist">
                    <div class="regist-header">
                        <div class="h2">Get Your Subscription</div>
                        <div class="p">Subscription {{ $username }}</div>
                    </div>
                    @if (Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ Session::get('error') }}</strong>
                        </div>
                    @endif
                    <div class="card-body text-center">
                        <form method="post" action="{{ route('subscribe', $id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" placeholder="First Name" class="form-control" id="first_name"
                                    name="first_name" required>
                                @error('first_name')
                                    <h6 style="color:red">{{ $message }}</h6>
                                @enderror
                            </div>
                            <div class="col mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" placeholder="Last Name" class="form-control" id="last_name"
                                    name="last_name" required>
                                @error('last_name')
                                    <h6 style="color:red">{{ $message }}</h6>
                                @enderror
                            </div>
                            <div class="col mb-3">
                                <label for="card_number" class="form-label">Card Number</label>
                                <input type="text" placeholder="5723----" class="form-control" id="card_number"
                                    name="card_number" required>
                                @error('card_number')
                                    <h6 style="color:red">{{ $message }}</h6>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="expired_date" class="form-label">Expiration Date</label>
                                <input type="month" class="form-control" name="expired_date" id="expired_date" required>
                                @error('expired_date')
                                    <h6 style="color:red">{{ $message }}</h6>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="CVV" class="form-label">CVV (3 Digit Number)</label>
                                <input type="text" placeholder="---" class="form-control" id="CVV" name="CVV">
                                @error('CVV')
                                    <h6 style="color:red">{{ $message }}</h6>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary"
                                onclick="alert('Are You Sure?')">Subscribe</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
