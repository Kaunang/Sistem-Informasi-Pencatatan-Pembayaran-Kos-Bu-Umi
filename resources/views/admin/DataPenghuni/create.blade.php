@extends('layouts.admin.master')
@section('title', 'Tambah Data Penghuni')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="mb-4">Form Input Data</h3>
            <br>
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('admin.DataPenghuni.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="id" class="col-md-2 col-form-label text-end">ID <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="id" name="id" value="{{ $newId }}" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama" class="col-md-2 col-form-label text-end">Nama <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat" class="col-md-2 col-form-label text-end">Alamat <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="no_hp" class="col-md-2 col-form-label text-end">No HP <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan No HP">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="registrasi" class="col-md-2 col-form-label text-end">Registrasi <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="date" class="form-control" id="registrasi" name="registrasi">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="id_kamar" class="col-md-2 col-form-label text-end">ID Kamar <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <select name="id_kamar" id="id_kamar" class="form-control" required>
                            <option value="" disabled selected>Pilih Kamar</option>
                            @foreach ($kamar as $k)
                                <option value="{{ $k->id }}">{{ $k->id }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="foto" class="col-md-2 col-form-label text-end">Foto <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="file" class="form-control" id="foto" name="foto">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-10 d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="/Data-Penghuni" class="btn btn-success">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
