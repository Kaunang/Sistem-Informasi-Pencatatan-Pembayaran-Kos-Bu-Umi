@extends('layouts.admin.master')
@section('title', 'Tambah Data Kamar')
@section('content')
<br>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4 class="mb-4">Form Input Data</h4>
            <br>
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('admin.DataKamar.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label for="id" class="col-md-2 col-form-label text-end">ID <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="id" name="id" value="{{ $newId ?? '' }}" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="kapasitas" class="col-md-2 col-form-label text-end">Kapasitas <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input class="form-control" type="number" name="kapasitas" id="kapasitas" placeholder="Masukkan Kapasitas" value="{{ old('kapasitas') }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="fasilitas" class="col-md-2 col-form-label text-end">Fasilitas <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="fasilitas" id="fasilitas" rows="3" placeholder="Masukkan Fasilitas" required>{{ old('fasilitas') }}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tarif" class="col-md-2 col-form-label text-end">Tarif /bulan <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input class="form-control" type="number" name="tarif" id="tarif" placeholder="Masukkan Tarif" value="{{ old('tarif') }}" required>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-10 d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ url('Data-Kamar') }}" class="btn btn-success">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
