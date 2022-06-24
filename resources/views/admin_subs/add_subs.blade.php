@extends('template.dash-template')

@section('dash-content')



<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Enter Subscription Details</h1>
    </div>

    {{-- <div id="error"></div> --}}
    <form method="post" action="/dashboard-admin/addSubs" id="addsubs" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama_paket" class="form-label">Nama Paket</label>
            <input type="text" class="form-control wajib-diisi" aria-describedby="nama" name="nama_paket" required placeholder="Enter Subscription Name"
            id="nama_paket" data-msg="Nama paket harus diisi">
      </div>
        <div class="mb-3">
            <label for="harga_paket" class="form-label">Harga Paket</label>
            <input type="text" class="form-control wajib-diisi" name="harga_paket" required placeholder="Enter Price"
            id="harga_paket" data-msg="Harga paket harus diisi">
            </div>
            <input class="btn btn-primary" type="submit" value="Submit">
      </form>
   
      <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Subscription?</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Apakah anda yakin ingin menambah subscription?
            </div>
            <div class="modal-footer">
              <button type="submit" id="submit" value="SUBMIT" class="btn btn-primary">Iya</button>
              <a href="/dashboard-admin/addSubs" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</a>
            </div>
          </div>
        </div>
      </div>
 

@endsection