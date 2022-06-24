@extends('template.dash-template')

@section('dash-content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">List Subscription</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="/dashboard-admin/addSubs"><button class="btn" style="background-color: #424874; color:aliceblue">Add Subscription</button></a>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
          <span data-feather="calendar"></span>
          This week
        </button>
      </div>
    </div>
    <div>
      <style>
        th{
            
            background: #000000;
        }
        tr:hover {
            background-color:#808080;
        }
    </style>
    <table class="table table-hover table-light" id="subs" cellpadding="10">
        @csrf
        <thead class="thead">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Paket</th>
                <th scope="col">Harga Paket</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
    
        <tbody>
            @php ($nomor = 1 )
            @foreach($subs as $sub)
            <tr>
                <th scope="row">{{ $nomor }}</th>
                <td>{{ $sub->nama_paket }}</td>
                <td>{{ $sub->harga_paket }}</td>
                <td>
                    <a href="/dashboard-admin/subscription/edit/{{ $sub->id }}"><button class="btn btn-primary">Edit</button></a>
                    <button type="button" class="btn btn-danger deleteSubsBtn" value="{{ $sub->id }}" id="delsubs" href="">Delete</button>
                </td>    
                <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form action="{{ route('admin.delSubs')}}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hapus Subscription?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                  <input type="hidden" name="subs_delete" id="id">
                                Apakah anda yakin ingin menghapus subscription?
                              </div>
                              <div class="modal-footer">
                                  {{-- <button type="submit" id="del" class="btn btn-danger">Iya</button> --}}
                                  <button id="btnDelete" type="submit" class="btn btn-danger">Iya</button></a>
                                  <a href="/dashboard-admin/subscription" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</a>
                              </div>
                        </form>
                      </div>
                    </div>
                  </div>
            </tr>
            @php ($nomor++)
            @endforeach
        </tbody>
    </table>



    </div>
@endsection