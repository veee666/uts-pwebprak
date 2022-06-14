@extends('template.structure_admin')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
                <div class="card-body text-center">        
                    <form method="post" action="{{ route('subscribe',$id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col mb-3">
                            <label for="nama_depan" class="form-label">First Name</label>
                            <input type="text" placeholder="First Name" class="form-control" id="nama_depan" name="nama_depan" required>
                        </div>
                        <div class="col mb-3">
                            <label for="nama_belakang" class="form-label">Last Name</label>
                            <input type="text" placeholder="Last Name" class="form-control" id="nama_belakang" name="nama_belakang" required>
                        </div>
                        <div class="col mb-3">
                            <label for="nomor_kartu" class="form-label">Card Number</label>
                            <input type="text" placeholder="5723----" class="form-control" id="nomor_kartu" name="nomor_kartu" required>
                        </div>
                        <div class="mb-3">
                            <label for="tgl_expired" class="form-label">Expiration Date</label>
                            <input type="month" class="form-control" name="tgl_expired" id="tgl_expired" required>
                        </div>
                        <div class="mb-3">
                            <label for="CVV" class="form-label">CVV (3 Digit Number)</label>
                            <input type="text" placeholder="---" class="form-control" id="CVV" name="CVV">
                        </div>
                        
                        <button type="submit" class="btn btn-primary" onclick="alert('Are You Sure?')">Subscribe</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection