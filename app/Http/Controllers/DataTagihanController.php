<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\data_kamar;
use App\Models\data_penghuni;
use App\Models\pembayaran;
use Illuminate\Support\Facades\DB;


class DataTagihanController extends Controller
{

    public function index()
    {
        return view('admin.pembayaran.index');
    }

    public function data(Request $request)
    {
        $bulan_tahun = $request->bulan . '-' . $request->tahun;

        $data = pembayaran::where('bulan_tahun', $bulan_tahun)
            ->where('status', 'belum bayar')
            ->get();

        if ($data->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada data tagihan untuk bulan dan tahun ini.');
        }

        return view('admin.pembayaran.data', ['dataTagihan' => $data])->with('success', 'Data Tagihan Berhasil Dibuat');
    }

    public function update(Request $request, $id_pembayaran)
    {
        $data = pembayaran::find($id_pembayaran);
        $data->status = 'lunas';
        $data->tgl_bayar = now();
        $data->update();
        return redirect('/Pembayaran-Lunas')->with('success', 'Data Berhasil Diubah');
    }

    public function create()
    {
        $data = data_penghuni::all();
        return view('admin.pembayaran.create', ['dataTagihan' => $data]);
    }

    public function store(request $request)
    {
        $dataPenghuni = DB::table('data_penghuni')->get();

        if ($dataPenghuni->isEmpty()) {
            return redirect()->back()->withErrors(['errors'  => 'Tidak ada data penghuni ditemukan!']);
        }

        $bulan = $request->bulan;
        $tahun = $request->tahun;

        foreach ($dataPenghuni as $penghuni) {
            DB::table('pembayaran')->insert([
                'id_penghuni' => $penghuni->id,
                'id_kamar' => $penghuni->id_kamar,
                'bulan_tahun' => $bulan . '-' . $tahun,
                'status' => 'belum bayar',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect('/Data-Tagihan')->with('success', 'Data Tagihan Berhasil Dibuat');
    }

    public function lunas()
    {
        $data = pembayaran::with(['data_penghuni', 'data_kamar'])
            ->where('status', 'lunas')
            ->orderBy('id_pembayaran', 'desc')
            ->get();
            // dd($data);

        return view('admin.pembayaran.lunas', ['dataTagihan' => $data]);
    }

    
public function laporan()
{
    // Mengambil data dengan grup bulan_tahun dan menjumlahkan tarif
    $data = pembayaran::where('status', 'lunas')
                ->select('bulan_tahun', DB::raw('SUM(data_kamar.tarif) as total_pendapatan'))
                ->join('data_kamar', 'pembayaran.id_kamar', '=', 'data_kamar.id')
                ->groupBy('bulan_tahun')
                ->orderBy('bulan_tahun', 'asc')
                ->get();

    return view('admin.pembayaran.laporan', ['dataTagihan' => $data]);
}


}
