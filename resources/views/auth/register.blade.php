@extends('template.structure')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<link href="/css/dashboard.css" rel="stylesheet">

@section('content')
<div class="container-service">
    <div class="main-about">
        <div class="images-about" style= "margin-bottom: 100px;">
        <section class="banner-about">
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom" style="margin-top:-100px">
                    <h1 class="h2">Enter Member Credentials</h1>
                </div>
            
                <form method="post" action="{{ route('client.register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" placeholder="Enter Name" class="form-control" id="nama" aria-describedby="nama" name="namaMember">
                    </div>
                    <div class="mb-3">
                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" class="form-control" name="password" id="psw" required>
                    </div>
                    <div class="mb-3">
                        <label for="noTelp" class="form-label">Nomor Telepon</label>
                        <input type="text" placeholder="Enter Phone Number" class="form-control" id="noTelp" name="noTelpMember">
                    </div>
                    <div class="mb-3">
                        <label for="umur" class="form-label">Umur</label>
                        <input type="text" placeholder="Enter Age" class="form-control" id="umur" name="umurMember">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email"  placeholder="Enter Email" class="form-control" id="email" name="emailMember">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto Member</label>
                        <input type="file" placeholder="Input Foto"  name="foto" id="foto" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                <p>Sudah Punya Akun? <a href="{{ route('showLogin') }}">Login</a></p>
        </section>
        </div>
    </div>
</div>
@endsection