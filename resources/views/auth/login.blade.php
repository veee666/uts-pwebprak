@extends('template.structure')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


@section('content')
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col d-flex justify-content-center text-center">
                <div class="card-login">
                    <div class="card-header">
                        <div class="h2">Welcome back</div>
                        <div class="p">Login to your account to access your program </div>
                    </div><br>
                    @if (Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ Session::get('error') }}</strong>
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('auth.login') }}">
                            @csrf
                            <div class="row mb-4">
                                <label for="nama" class="col-md-4 col-form-label text-md-end">Username</label>

                                <div class="col-md-6">
                                    <input id="nama" placeholder="example" type="string"
                                        class="form-control @error('nama') is-invalid @enderror" name="namaMember"
                                        value="{{ old('nama') }}" required>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                                <div class="col-md-6">
                                    <input id="password" placeholder="***********" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row-pass">
                                <div class="col-pass">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary" style="padding: 10px 32px">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                            <div class="p">Belum punya akun?<a href="{{ route('showRegist') }}"> Register</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
