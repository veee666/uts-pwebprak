@extends('template.user.dash-template')

@section('dash-content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Profile</h1>
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
    <div class="container px-4">
        <div class="row gx-2">
          <div class="col-sm-3 col-md-4">
            <img src="{{ asset('storage/foto_member/'.$member->fotoMember) }}" class="img-fluid rounded">
          </div>
          <div class="col">
            <dl class="row">
                <dt class="col-sm-3">Nama</dt>
                <dd class="col-sm-9">{{ $member->namaMember }}</dd>
              
                <dt class="col-sm-3">Tanggal lahir</dt>
                <dd class="col-sm-9">{{ $tgl_lahir }}</dd>
              
                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9">{{ $member->emailMember }}</dd>

                <dt class="col-sm-3">Nomor telp</dt>
                <dd class="col-sm-9">{{ $member->noTelpMember }}</dd>
                
                <dt class="col-sm-3">Subscription</dt>
                <dd class="col-sm-9">
                    @if($member->subs_id)
                    {{ $member->namaPaket(Auth::user()->subs_id)->nama_paket }}
                    <form method="post" action="{{ route('stop_subscription',Auth::user()->id) }}">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-danger deleteBtn" id="delsub" value="{{ $member->namaPaket(Auth::user()->subs_id)->nama_paket }}">Stop Subscription</button>
                    </form>
                @else 
                    <p>You have not yet subscribe to any plan</p>
                @endif
                </dd>
              </dl>
              <div class="modal fade" id="delete_member_subs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form action="{{ route('stop_subscription',Auth::user()->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        {{-- @method('delete') --}}
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Subscription?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <input type="hidden" name="subs_delete_member" id="id_subs">
                            Apakah anda yakin ingin menghapus pembelian subscription? Anda masih dapat menikmati benefit dari subscription yang sudah dibeli sampai batas akhir subscription.
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
          </div>
          </div>
        </div>
    </div>
@endsection

{{-- 
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
                    <a href="/dashboard-user/member/edit/{{ $member->id }}"><button class="btn btn-primary">Edit</button></a>
                    <a href="/dashboard-user/member/del/{{ $member->id }}"><button class="btn btn-danger">Delete</button></a>
                </td>    
            </tr>
            @php ($nomor++)
            @endforeach
        </tbody>
    </table> --}}