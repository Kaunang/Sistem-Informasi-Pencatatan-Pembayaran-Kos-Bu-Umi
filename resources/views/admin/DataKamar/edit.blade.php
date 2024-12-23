@extends('layouts.admin.master')
@section('title', 'Edit Data Kamar')
@section('content')
<br>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4 class="mb-4">Edit Data Kamar</h4>
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
            <form action="{{ route('admin.DataKamar.update', $datakamar->id) }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label for="id" class="col-md-2 col-form-label text-end">ID <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="id" name="id" value="{{ $datakamar->id }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="kapasitas" class="col-md-2 col-form-label text-end">Kapasitas <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input class="form-control" type="number" name="kapasitas" id="kapasitas" value="{{ $datakamar->kapasitas }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="fasilitas" class="col-md-2 col-form-label text-end">Fasilitas <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="fasilitas" id="fasilitas" rows="3"  required>{{ $datakamar->fasilitas }}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tarif" class="col-md-2 col-form-label text-end">Tarif /bulan <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input class="form-control" type="number" name="tarif" id="tarif"  value="{{ $datakamar->tarif }}" required>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-10 d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        <a href="{{ url('Data-Kamar') }}" class="btn btn-success">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
