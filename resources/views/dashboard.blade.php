@extends('template.dash-template')

@section('dash-content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">List Member</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="/dashboard/addMember"><button class="btn" style="background-color: #424874; color:aliceblue">Add Member</button></a>
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
                <th scope="col">Usia</th>
                <th scope="col">No Telp</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
    
        <tbody>
            @php ($nomor = 1 )
            @foreach($member as $member)
            <tr>
                <th scope="row">{{ $nomor }}</th>
                <td>{{ $member->namaMember }}</td>
                <td>{{ $member->umurMember }}</td>
                <td>{{ $member->noTelpMember }}</td>
                <td>{{ $member->emailMember }}</td>
                <td>
                    <a href="/dashboard/member/edit/{{ $member->id }}"><button class="btn btn-primary">Edit</button></a>
                    <a href="/dashboard/member/del/{{ $member->id }}"><button class="btn btn-danger">Delete</button></a>
                </td>    
            </tr>
            @php ($nomor++)
            @endforeach
        </tbody>
    </table>
    </div>
@endsection