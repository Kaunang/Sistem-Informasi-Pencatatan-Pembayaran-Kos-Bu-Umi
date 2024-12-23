@extends('layouts.admin.master')
@section('title', 'Edit Data Penghuni')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="mb-4">Edit Data Penghuni</h3>
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
            <form action="{{ route('admin.DataPenghuni.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="id" class="col-md-2 col-form-label text-end">ID <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="id" name="id" placeholder="Masukkan ID"
                        value="{{$data->id}}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama" class="col-md-2 col-form-label text-end">Nama <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama"
                        value="{{$data->nama}}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat" class="col-md-2 col-form-label text-end">Alamat <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat"
                        value="{{$data->alamat}}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="no_hp" class="col-md-2 col-form-label text-end">No HP <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan No HP"
                        value="{{$data->no_hp}}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="registrasi" class="col-md-2 col-form-label text-end">Registrasi <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="date" class="form-control" id="registrasi" name="registrasi"
                        value="{{$data->registrasi}}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="id_kamar" class="col-md-2 col-form-label text-end">ID Kamar <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <select name="id_kamar" id="id_kamar" class="form-control" required>
                            @foreach ($kamar as $k)
                                <option value="{{ $k->id }}" {{ $k->id == $data->id_kamar ? 'selected' : '' }}>
                                    {{ $k->id }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
    <label for="foto" class="col-md-2 col-form-label text-end">Foto <span class="text-danger">*</span></label>
    <div class="col-md-10">
        <input type="file" class="form-control" id="foto" name="foto" value="{{ old('foto', $data->foto) }}">
    </div>
</div>

<!-- Menampilkan Foto Penghuni -->
<div class="row mb-3">
    <label class="col-md-2 col-form-label text-end">Foto Penghuni</label>
    <div class="col-md-10">
        <div class="d-flex justify-content">
            <!-- Menampilkan foto jika ada -->
            @if($data->foto)
                <img src="{{ asset('storage/public/' . $data->foto) }}" alt="Foto {{ $data->nama }}"  style="max-width: 220px;">
            @else
                <p class="text-center">Foto tidak tersedia</p>
            @endif
        </div>
    </div>
</div>


                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-10 d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        <a href="/Data-Penghuni" class="btn btn-success">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
