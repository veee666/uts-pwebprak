@extends('template.dash-template')

@section('dash-content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Enter Member Credentials</h1>
    </div>

    <form method="post" action="/dashboard/addMember" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" aria-describedby="nama" name="namaMember">
        </div>
        <div class="mb-3">
            <label for="noTelp" class="form-label">Nomor Telepon</label>
            <input type="text" class="form-control" id="noTelp" name="noTelpMember">
        </div>
        <div class="mb-3">
            <label for="umur" class="form-label">Umur</label>
            <input type="text" class="form-control" id="umur" name="umurMember">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="emailMember">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto Member</label>
            <input type="file" name="foto" id="foto" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection