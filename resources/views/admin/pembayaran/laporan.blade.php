@extends('layouts.admin.master')
@section('title', 'Laporan Keuangan')
@section('content')

<div class="container">
    <h1>Laporan Keuangan</h1>
    <div class="table-wrapper">
        <table class="table table-bordered table-striped" id="tabel-laporan">
            <thead>
                <tr>
                    <th class="text-center" style="width: 5%">No</th>
                    <th class="text-center" style="width: 15%">Bulan Tahun</th>
                    <th class="text-center" style="width: 15%">Pendapatan Rp.</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataTagihan as $key => $data)
                <tr>
                    <td class="text-center">{{ $key + 1 }}</td>
                    <td class="text-center">{{ $data->bulan_tahun }}</td>
                    <td class="text-center">{{ number_format($data->total_pendapatan, 2, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection