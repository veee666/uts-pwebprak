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
        <img src="{{ asset('storage/foto_member/'.$member->fotoMember) }}" style="width: 360px; height: 270px;"><br>
        <h3>Nama</h3>
        {{ $member->namaMember }}<br>
        <h3>Tanggal Lahir</h3>
        {{ $tgl_lahir }}<br>
        <h3>Email</h3>
        {{ $member->emailMember }}<br>
        <h3>Nomor Telepon</h3>
        {{ $member->noTelpMember }}<br>
        <h3>Subscription</h3>
        @if($member->subs_id)
            {{ $member->namaPaket(Auth::user()->subs_id)->nama_paket }}
            <form method="post" action="{{ route('stop_subscription',Auth::user()->id) }}">
                @csrf
                @method('delete')
                <button class="btn btn-danger" type="submit">Stop Subscription</button>
            </form>
        @else 
            <p>You have not yet subscribe to any plan</p>
        @endif
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