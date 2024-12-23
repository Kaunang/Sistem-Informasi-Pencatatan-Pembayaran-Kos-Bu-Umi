<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\data_penghuni;
use App\Models\data_kamar;
use App\Models\pembayaran;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboardUser() {
        $user = Auth::user(); // Mendapatkan pengguna yang sedang login
        $id = $user->id_penghuni; // Mengambil ID penghuni dari user
    
        $data = data_penghuni::find($id);
    
        if (!$data) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    
        $dataKamar = data_kamar::find($data->id_kamar);
    
        if (!$dataKamar) {
            return redirect()->back()->with('error', 'Data kamar tidak ditemukan');
        }
    
        $dataTagihan = pembayaran::where('id_penghuni', $id)
                                  ->where('status', 'belum bayar')
                                  ->get();
        
        // Tentukan apakah ada tagihan yang belum dibayar
        $tagihanBelumDibayar = $dataTagihan->isNotEmpty();

        return view('user.dashboard', [
            'data_penghuni' => $data,
            'data_kamar' => $dataKamar,
            'dataTagihan' => $dataTagihan,
            'tagihanBelumDibayar' => $tagihanBelumDibayar,
        ]);
    }
    

    public function profilUser() {
        $user = Auth::user(); // Mendapatkan user yang sedang login
        $data = data_penghuni::where('id', $user->id_penghuni)->first(); // Mengambil data_penghuni berdasarkan user_id
        
        if (!$data) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        return view('user.profil', ['data_penghuni' => $data]);
    }
    
    public function tagihanUser() {
        $user = Auth::user(); // Mendapatkan user yang sedang login
        $dataTagihan = pembayaran::where('id_penghuni', $user->id_penghuni)->get(); // Mengambil tagihan berdasarkan id_penghuni
        
        return view('user.tagihan', compact('dataTagihan'));
    }
}
