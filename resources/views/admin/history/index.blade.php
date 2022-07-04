@extends('template.dash-template')

@section('dash-content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">List History Subscription</h1>
        </div>
        <div>
            <style>
                th {

                    background: #000000;
                }

                tr:hover {
                    background-color: #808080;
                }
            </style>
            <table class="table table-hover table-light" id="subs" cellpadding="10">
                @csrf
                <thead class="thead">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Paket</th>
                        <th scope="col">User</th>
                        <th scope="col">Tanggal Langganan</th>
                        <th scope="col">Tanggal Selesai Langganan</th>
                        <th scope="col">Status Langganan</th>

                    </tr>
                </thead>

                <tbody>
                    @php($nomor = 1)
                    @foreach ($subs as $sub)
                        <tr>
                            <th scope="row">{{ $nomor }}</th>
                            <td>{{ $sub->namaPaket($sub->subs_id) }}</td>
                            <td>{{ $sub->userSubs->namaMember }}</td>
                            <td>{{ \Carbon\Carbon::parse($sub->created_at)->format('d-m-Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($sub->end_subscription)->format('d-m-Y') }}</td>
                            @php($status = \Carbon\Carbon::parse($sub->end_subscription))
                            @if ($status->isPast())
                                <td>Expired</td>
                                @else
                                <td>Masih Berlaku</td>
                            @endif
                        </tr>
                        @php($nomor++)
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
