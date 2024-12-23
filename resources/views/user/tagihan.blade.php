@extends('layouts.user.master')
@section('title', 'Tagihan Penghuni')
@section('content')
<br>
<div class="container">
    <h2 class="text-center mb-4">Tagihan Penghuni</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="table-wrapper">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Tagihan Bulan</th>
                <th>Total Tagihan Rp.</th>
                <th>Tanggal Bayar</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataTagihan as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->bulan_tahun }}</td>
                    <td>{{ $data->data_kamar->tarif }}</td>
                    <td>
                        @if($data->tgl_bayar)
                            {{ \Carbon\Carbon::parse($data->tgl_bayar)->format('d-m-Y') }}
                        @else
                            <span class="text-warning">Belum Dibayar</span>
                        @endif
                    </td>
                    <td>
                    @if($data->status == 'belum bayar')
                        <div class="bg-danger text-white" style="display: inline-block; padding: 5px; max-width: 150px; border-radius: 5px;">
                            {{ $data->status }}
                        </div>
                    @elseif($data->status == 'lunas')
                        <div class="bg-info text-white" style="display: inline-block; padding: 5px; max-width: 150px; border-radius: 5px;">
                            {{ $data->status }}
                        </div>
                    @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection
