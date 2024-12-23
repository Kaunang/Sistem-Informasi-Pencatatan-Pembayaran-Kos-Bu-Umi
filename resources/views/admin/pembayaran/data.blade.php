@extends('layouts.admin.master')
@section('title', 'Aplikasi Laravel')
@section('content')
<br>
<div class="container">
    <div class="text-start">
        <p>Data Tagihan</p>
    </div>
    <div class="table-wrapper">
    <table class="table table-bordered table-striped" id="tabel-tagihan">
        <thead>
                <tr>
                    <th style="width:1%">No.</th>
                    <th style="width:5%">ID Penghuni</th>
                    <th style="width:5%">Nama</th>
                    <th style="width:5%">Tagihan</th>
                    <th style="width:5%">Status</th>
                    <th style="width:5%">Aksi</th>
                </tr>
        </thead>
        <tbody>
        @foreach ($dataTagihan as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->id_penghuni }}</td>
                <td>{{ $data->data_penghuni->nama}}</td>
                <td>{{ $data->data_kamar->tarif}}</td>
                <td>
                    <div class="bg-danger text-white" style="display: inline-block; padding: 5px; max-width: 150px; border-radius: 5px;">{{ $data->status}}</div>
                </td>
                <td>
                    <form action="{{ route('updatePembayaran', $data->id_pembayaran) }}" method="post">
                        @csrf
                        
                        <button type="submit" class="btn btn-info text-white"><i class="fas fa-check"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <div class="text-start">
        <a href="{{ url('Data-Tagihan') }}" class="btn btn-primary">Kembali</a>
    </div>
</div>
@endsection
