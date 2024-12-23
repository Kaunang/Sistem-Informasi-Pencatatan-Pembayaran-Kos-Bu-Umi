@extends('layouts.admin.master')
@section('title', 'Data Penghuni')
@section('content')
<br>
<div class="container">
    <h1>Data Penghuni</h1>
    <div class="d-flex mb-3">
        <a href="{{route('admin.DataPenghuni.create')}}" class="btn btn-success me-auto">Tambah Data</a>
    </div>
    <div class="table-wrapper">
        <table class="table table-bordered tabel striped" id="tabel-penghuni">
            <thead>
                <tr>
                    <th class="text-center" style="width: 1%">No</th>
                    <th class="text-center" style="width: 5%">ID</th>
                    <th class="text-center" style="width: 5%">Nama</th>
                    <th class="text-center" style="width: 5%">ID Kamar</th>
                    <th class="text-center" style="width: 5%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_penghuni as $data)
                <tr>
                    <td> {{ $loop->iteration }}</td>
                    <td> {{ $data->id }}</td>
                    <td> {{ $data->nama }}</td>
                    <td> {{ $data->id_kamar }}</td>
                    <td>
                        <form action="{{ route('admin.DataPenghuni.delete', $data->id)}}" method="post">@csrf 
                            <a href="{{ route('admin.DataPenghuni.detail', $data->id) }}" class="btn btn-info">Detail</a>
                            <a href="{{ route('admin.DataPenghuni.edit', $data->id)}}" class="btn btn-warning">Edit</a>
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