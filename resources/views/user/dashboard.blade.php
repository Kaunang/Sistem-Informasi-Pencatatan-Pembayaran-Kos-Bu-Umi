@extends('layouts.user.master')
@section('title', 'Dashboard Penghuni')
@section('content')
<!-- Notifikasi -->
@if($tagihanBelumDibayar)
<div class="alert alert-danger" role="alert">
    <strong>Perhatian!</strong> Anda memiliki tagihan yang belum dibayar. Harap segera melunasi.
</div>
@endif

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <h2 class="mb-3">Dashboard Penghuni</h2>
                    <h4>Halo, {{ $data_penghuni->nama }}!</h4>
                    <p class="text-muted">Kamu memiliki kamar dengan ID: <strong>{{ $data_penghuni->id_kamar }}</strong></p>
                </div>
            </div>

            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h4 class="card-title mb-3 text-secondary">Fasilitas Kamar</h4>
                    <p>{{ $data_kamar->fasilitas }}</p>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-3 text-secondary">Tagihan Belum Dibayar</h4>
                    @if($dataTagihan->isEmpty())
                        <div class="alert alert-success text-center" role="alert">
                            Tidak ada tagihan yang belum dibayar.
                        </div>
                    @else
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>Bulan/Tahun</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dataTagihan as $tagihan)
                                    <tr>
                                        <td>{{ $tagihan->bulan_tahun }}</td>
                                        <td class="text-warning">{{ $tagihan->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
