@extends('template.dash-template')

@section('dash-content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Member Credentials</h1>
    </div>
    @foreach($member as $m)
    <form method="post" action="/dashboard/member/edit/{{ $m->id }}">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" aria-describedby="nama" name="namaMember" value="{{ $m->namaMember }}">
        </div>
        <div class="mb-3">
            <label for="noTelp" class="form-label">Nomor Telepon</label>
            <input type="text" class="form-control" id="noTelp" name="noTelpMember" value="{{ $m->noTelpMember }}">
        </div>
        <div class="mb-3">
            <label for="umur" class="form-label">Umur</label>
            <input type="text" class="form-control" id="umur" name="umurMember" value="{{ $m->umurMember }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="emailMember" value="{{ $m->emailMember }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endforeach
@endsection