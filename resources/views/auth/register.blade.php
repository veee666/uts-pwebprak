@extends('template.structure')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<link href="/css/dashboard.css" rel="stylesheet">

@section('content')
    <div class="container-regist">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card-regist">
                    <div class="regist-header">
                        <div class="h2">Create your Account</div>
                        <div class="p">Join us for an amazing fitness routine!</div>
                    </div>
                    @if (Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ Session::get('error') }}</strong>
                        </div>
                    @endif
                    <div class="card-body text-center">
                        <form method="post" action="{{ route('client.register') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col mb-3">
                                <label for="nama" class="form-label">Name</label>
                                <input type="text" placeholder="example" class="form-control" id="nama"
                                    aria-describedby="nama" name="namaMember">
                                @error('namaMember')
                                    <h6 style="color:red">{{ $message }}</h6>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="psw" class="form-label">Password</label>
                                <input type="password" placeholder="***********" class="form-control" name="password"
                                    id="psw">
                                @error('password')
                                    <h6 style="color:red">{{ $message }}</h6>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="noTelp" class="form-label">Phone Number</label>
                                <input type="text" placeholder="+62**********" class="form-control" id="noTelp"
                                    name="noTelpMember">
                                @error('noTelpMember')
                                    <h6 style="color:red">{{ $message }}</h6>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
                                @error('tgl_lahir')
                                    <h6 style="color:red">{{ $message }}</h6>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" placeholder="example@gmail.com" class="form-control" id="email"
                                    name="emailMember">
                                @error('emailMember')
                                    <h6 style="color:red">{{ $message }}</h6>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Profile Picture</label>
                                <input type="file" name="foto" accept="image/*"id="foto" class="form-control">
                                @error('foto')
                                    <h6 style="color:red">{{ $message }}</h6>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Sign Up</button>
                        </form>

                        <div class="p">Sudah Punya Akun? <a href="{{ route('showLogin') }}">Login</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
