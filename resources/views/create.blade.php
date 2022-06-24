@extends('template.dash-template')

@section('dash-content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Enter Member Credentials</h1>
    </div>

    <form method="post" action="/dashboard-admin/addMember" enctype="multipart/form-data" id="addmember">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" aria-describedby="nama" name="namaMember" data-msg="Nama member harus diisi">
        </div>
        <div class="mb-3">
            <label for="psw" class="form-label">Password</label>
            <input type="password" placeholder="***********" class="form-control" name="password" id="psw" required data-msg="Password harus diisi">
        </div>
        <div class="mb-3">
            <label for="noTelp" class="form-label">Nomor Telepon</label>
            <input type="text" class="form-control" id="noTelp" name="noTelpMember" data-msg="Nomor telephone member harus diisi">
        </div>
        <div class="mb-3">
            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" data-msg="Tanggal lahir member harus diisi">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="emailMember" data-msg="Email member harus diisi">
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto Member</label>
            <input type="file" name="foto" id="foto" class="form-control" required data-msg="Foto member harus diisi">
        </div>
        <input class="btn btn-primary" type="submit" value="Submit">
    </form>

    <div class="modal fade" id="member" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Member?</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Apakah anda yakin ingin menambah member?
            </div>
            <div class="modal-footer">
              <button type="submit" id="input" value="SUBMIT" class="btn btn-primary">Iya</button>
              <a href="/dashboard-admin/addSubs" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</a>
            </div>
          </div>
        </div>
      </div>
@endsection