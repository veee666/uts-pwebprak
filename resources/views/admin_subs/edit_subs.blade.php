@extends('template.dash-template')

@section('dash-content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Subscription Details</h1>
    </div>

    <form method="post" action="{{ route('admin.editSubs',$subs->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama_paket" class="form-label">Nama Paket</label>
            <input type="text" class="form-control" id="nama_paket" aria-describedby="nama" name="nama_paket" required value="{{ $subs->nama_paket }}">
        </div>
        <div class="mb-3">
            <label for="harga_paket" class="form-label">Harga Paket</label>
            <input type="text" class="form-control" id="harga_paket" name="harga_paket" required value="{{ $subs->harga_paket }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection