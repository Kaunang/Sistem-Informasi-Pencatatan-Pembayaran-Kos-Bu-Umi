@extends('layouts.admin.master')
@section('title', 'Dashboard Admin')
@section('content')
<style>
    .card {
      color: white;
      position: relative;
      overflow: hidden;
      height: 150px; /* Tetapkan tinggi kartu */
    }
    .card a {
      text-decoration: none;
      color: white;
    }
    .card a:hover {
      color: #ddd;
    }
    .card-blue {
      background-color: #007bff;
    }
    .card-yellow {
      background-color: #ffc107;
    }
    .card-red {
      background-color: #dc3545;
    }
    .card-green {
      background-color: #28a745;
    }
    .icon {
      font-size: 3rem;
      position: absolute;
      top: 10px;
      right: 10px;
      opacity: 0.5;
    }
    .more-info {
      position: absolute;
      bottom: 10px;
      left: 50%;
      transform: translateX(-50%);
      background-color: rgba(0, 0, 0, 0.2); /* Warna lebih gelap */
      padding: 5px 15px;
      border-radius: 5px;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>
  <div class="container my-5">
    <h3 class="mb-4">Dashboard | Administrator</h3>
    <div class="row g-3">
      <div class="col-md-3">
        <div class="card card-blue p-3">
          <i class="fas fa-home icon"></i>
          <h1>{{ $dataKamar }}</h1>
          <p>Jumlah Kamar</p>
          <div class="more-info">
            <a href="Data-Kamar">More info</a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card card-yellow p-3">
          <i class="fas fa-users icon"></i>
          <h1>{{ $dataPenghuni }}</h1>
          <p>Penghuni Aktif</p>
          <div class="more-info">
            <a href="Data-Penghuni">More info</a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card card-red p-3">
          <i class="fas fa-frown icon"></i>
          <h1>{{ $belumBayar }}</h1>
          <p>Belum Bayar</p>
          <div class="more-info">
            <a href="Data-Tagihan">More info</a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card card-green p-3">
          <i class="fas fa-smile icon"></i>
          <h1>{{ $lunas }}</h1>
          <p>Lunas</p>
          <div class="more-info">
            <a href="Pembayaran-Lunas">More info</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
