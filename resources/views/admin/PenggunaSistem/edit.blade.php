@extends('layouts.admin.master')
@section('title', 'Edit Pengguna Sistem')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="mb-4">Edit Pengguna Sistem</h3>
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
            <form action="{{route('admin.PenggunaSistem.update', $pengguna->username)}}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label for="username" class="col-md-2 col-form-label text-end">Username <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username"
                        value="{{ $pengguna->username }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-md-2 col-form-label text-end">Password<span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="password" name="password" placeholder="Masukkan Password Baru (Opsional)">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-10 d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        <a href="{{ url('/Pengguna-Sistem') }}" class="btn btn-success">Kembali</a>
                    </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
