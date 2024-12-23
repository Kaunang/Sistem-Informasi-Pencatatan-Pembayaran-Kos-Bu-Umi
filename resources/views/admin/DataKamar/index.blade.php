@extends('layouts.admin.master')
@section('title', 'Data Kamar')
@section('content')
<br>
<div class="container">
    <h1>Data Kamar</h1>
    <div class="d-flex mb-3">
        <a href="{{route('admin.DataKamar.create')}}" class="btn btn-success me-auto">Tambah Data</a>
    </div>
    <div class="table-wrapper">
        <table class="table table-bordered tabel-striped" id="tabel-kamar">
            <thead>
                <tr>
                    <th class="text-center" style="width: 1%">No</th>
                    <th class="text-center" style="width: 5%">ID</th>
                    <th class="text-center" style="width: 3%">Kapasitas</th>
                    <th class="text-center" style="width: 5%">Fasilitas</th>
                    <th class="text-center" style="width: 5%">Tarif /bulan</th>
                    <th class="text-center" style="width: 5%">Status</th>
                    <th class="text-center" style="width: 5%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datakamar as $data)
                <tr>
                    <td> {{ $loop->iteration }}</td>
                    <td> {{ $data->id }}</td>
                    <td> {{ $data->kapasitas }}</td>
                    <td> {{ $data->fasilitas }}</td>
                    <td> {{ number_format($data->tarif, 0, ',', '.') }}</td>
                    <td class="text-center">
                        @if ($data->status_kamar == 'Kosong')
                            <span class="badge bg-success">Kosong</span>
                        @else
                            <span class="badge bg-danger">Terisi</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('admin.DataKamar.delete', $data->id)}}" method="post">@csrf 
                            <a href="{{ route('admin.DataKamar.edit', $data->id)}}" class="btn btn-warning">Edit</a>
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection