@extends('layouts.admin.master')
@section('title', 'Pengguna Sistem')
@section('content')
<br>
<div class="container">
    <h1>Pengguna Sistem</h1>
    <div class="d-flex mb-3">
        <a href="{{ route('admin.PenggunaSistem.create') }}" class="btn btn-success me-auto">Tambah Data</a>
    </div>
    <div class="table-wrapper">
        <table class="table table-bordered table-striped" id="tabel-pengguna">
            <thead>
                <tr>
                    <th style="width:5%">Nama Pengguna</th>
                    <th style="width:5%">Username</th>
                    <th style="width:5%">Level</th>
                    <th style="width:5%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataPenggunaSistem as $data)
                    <tr>
                        <td>{{ $data->nama_pengguna }}</td>
                        <td>{{ $data->username }}</td>
                        <td>{{ $data->level }}</td>
                        <td>
                        <form action="{{ route('admin.PenggunaSistem.delete', $data->username) }}" method="post">
                            @csrf
                            <a href="{{ route('admin.PenggunaSistem.edit', $data->username) }}" class="btn btn-warning">Edit</a>
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
