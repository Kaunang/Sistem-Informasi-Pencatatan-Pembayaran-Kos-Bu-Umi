<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\data_kamar;
use App\Models\data_penghuni;
use App\Models\pengguna_sistem;
use App\Models\pembayaran;

class DashboardAdminController extends Controller
{
    public function index(){
        $dataKamar = data_kamar::count();
        $dataPenghuni = data_penghuni::count();
        $belumBayar = pembayaran::where('status', 'belum bayar')->count();
        $lunas = pembayaran::where('status', 'lunas')->count();
        return view('admin.dashboard', ['dataKamar' => $dataKamar, 'dataPenghuni' => $dataPenghuni, 'lunas' => $lunas, 'belumBayar' => $belumBayar]);
    }
}


