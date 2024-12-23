@extends('layouts.admin.master')
@section('title', 'Pengguna Sistem')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="mb-4">Form Input Pengguna Sistem</h3>
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
            <form action="{{ route('admin.PenggunaSistem.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label for="level" class="col-md-2 col-form-label text-end">Level<span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <select class="form-control" id="level" name="level" required>
                            <option value="" disabled selected>Pilih Level</option>
                            <option value="admin">Admin</option>
                            <option value="penghuni">Penghuni</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3" id="id_penghuni_row" style="display: none;">
                    <label for="id_penghuni" class="col-md-2 col-form-label text-end">Penghuni<span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <select name="id_penghuni" id="id_penghuni" class="form-control">
                            <option value="" disabled selected>Pilih Nama Penghuni</option>
                            @foreach ($dataPenghuni as $data)
                                <option value="{{ $data->id }}">{{ $data->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="username" class="col-md-2 col-form-label text-end">Username <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username"
                            value="{{ old('username') }}">
                    </div>
                </div>

                <div class="row mb-3" id="id_nama_row" style="display: none;">
                    <label for="nama_pengguna" class="col-md-2 col-form-label text-end">Nama Pengguna<span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" placeholder="Masukkan Nama"
                        value="{{ old('nama_pengguna') }}">
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label for="password" class="col-md-2 col-form-label text-end">Password <span class="text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-10 d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>

                        <a href="{{ url('Pengguna-Sistem') }}" class="btn btn-success">Kembali</a></div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const levelInput = document.getElementById('level');
        const idPenghuniRow = document.getElementById('id_penghuni_row');
        const idNamaRow = document.getElementById('id_nama_row');

        // Fungsi untuk menampilkan atau menyembunyikan berdasarkan level
        function toggleIdPenghuni() {
            if (levelInput.value === 'penghuni') {
                idPenghuniRow.style.display = 'flex'; // Tampilkan jika pengguna
                idNamaRow.style.display = 'none'; // Tampilkan jika pengguna
            } else {
                idPenghuniRow.style.display = 'none'; // Sembunyikan jika bukan pengguna
                idNamaRow.style.display = 'flex'; // Tampilkan jika pengguna
            }
        }

        // Jalankan saat nilai dropdown level berubah
        levelInput.addEventListener('change', toggleIdPenghuni);

        // Jalankan logika saat halaman pertama kali dimuat
        toggleIdPenghuni();
    });
</script>

@endsection