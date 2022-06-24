@extends('template.dash-template')

@section('dash-content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">List Member</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="/dashboard-admin/addMember"><button class="btn" style="background-color: #424874; color:aliceblue">Add Member</button></a>
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
    <table class="table table-hover table-light" cellpadding="10">
        @csrf
        <thead class="thead">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">No Telp</th>
                <th scope="col">Email</th>
                <th scope="col">Foto</th>
                <th scope="col">Subscription</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
    
        <tbody>
            @php ($nomor = 1 )
            @foreach($member as $member)
            <tr>
                <th scope="row">{{ $nomor }}</th>
                <td>{{ $member->namaMember }}</td>
                @if(!$member->tgl_lahir)
                <td>Belum Input Tanggal Lahir</td>
                @else
                <td>{{ \Carbon\Carbon::parse($member->tgl_lahir)->format('d/m/Y') }}</td>
                @endif
                <td>{{ $member->noTelpMember }}</td>
                <td>{{ $member->emailMember }}</td>
                <td><img src="{{ asset('storage/foto_member/'.$member->fotoMember) }}" style="width: 100px; height: 100px;">
                <td>
                    @if (! $member->subs_id)
                        -
                    @else
                        {{ $member->namaPaket($member->subs_id)->nama_paket }}
                    @endif
                </td>
                <td>
                    <a href="/dashboard-admin/member/edit/{{ $member->id }}"><button class="btn btn-primary">Edit</button></a>
                    <button type="button" class="btn btn-danger deleteMemberBtn" value="{{ $member->id }}" id="delmember" href="">Delete</button>
                </td>   
                <div class="modal fade" id="delete_member" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form action="{{ route('admin.delMember')}}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hapus Member?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                  <input type="hidden" name="member_delete" id="member_id">
                                Apakah anda yakin ingin menghapus member?
                              </div>
                              <div class="modal-footer">
                                  {{-- <button type="submit" id="del" class="btn btn-danger">Iya</button> --}}
                                  <button id="btnDeleteMember" type="submit" class="btn btn-danger">Iya</button></a>
                                  <a href="/dashboard-admin/member" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</a>
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