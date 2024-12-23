@extends('layouts.admin.master')
@section('title', 'Profil Penghuni')
@section('content')
<div class="container mt-5">
    <h3 class="text-center mb-4">Profil Penghuni</h3>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="border p-4 rounded">
                <div class="row">
                    <!-- Kolom Biodata -->
                    <div class="col-md-8">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">ID</th>
                                    <td>{{ $data_penghuni->id }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nama</th>
                                    <td>{{ $data_penghuni->nama }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Alamat</th>
                                    <td>{{ $data_penghuni->alamat }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">No HP</th>
                                    <td>{{ $data_penghuni->no_hp }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Registrasi</th>
                                    <td>{{ $data_penghuni->registrasi }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">ID Kamar</th>
                                    <td>{{ $data_penghuni->id_kamar }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Kolom Foto Profil -->
                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                        <div class="text-center">
                        <img src="{{ asset('storage/public/' . $data_penghuni->foto) }}" alt="Foto {{ $data_penghuni->nama }}" width="220px">
                        </div>
                    </div>
                </div>
                <div class="mt-3 d-flex justify-content">
                    <a href="/Data-Penghuni" class="btn btn-success">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
