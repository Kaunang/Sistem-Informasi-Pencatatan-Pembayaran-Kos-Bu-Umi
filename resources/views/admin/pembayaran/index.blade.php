@extends('layouts.admin.master')
@section('title', 'Data Pembayaran')
@section('content')
<br>
<div class="container">

    
    <form action="{{ url('Data-pembayaran') }}" class="row g-3 align-items-center">
    @csrf
        <div class="col-md-12 d-flex align-items-center">
            <label for="bulan" class="form-label fw-bold" style="width: 100px;">Bulan</label>
            <select id="bulan" name="bulan" class="form-select" style="width: 40%;">
                <option selected>-- Pilih Bulan --</option>
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
        </div>

        <div class="col-md-12 d-flex align-items-center">
            <label for="tahun" class="form-label fw-bold" style="width: 100px;">Tahun</label>
            <select id="tahun" name="tahun" class="form-select" style="width: 40%;">
                <option selected>-- Pilih Tahun --</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
            </select>
        </div>

        <div class="col-md-3 align-self-end">
            <button type="submit" class="btn btn-success" style="width: 50%;">Lihat Tagihan</button>
        </div>
    </form>
</div>
@endsection

