<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\PenggunaSistem;
use App\Models\data_penghuni;
use App\Models\pengguna_sistem;
use App\Http\Controllers\Validator;

class PenggunaSistemController extends Controller
{
    public function index(){
        $data = pengguna_sistem::all();
        return view('admin.PenggunaSistem.index', ['dataPenggunaSistem' => $data]);
    }

    public function create()
    {
        $penghuniTerdaftar = pengguna_sistem::whereNotNull('id_penghuni')->pluck('id_penghuni')->toArray();
        $data = data_penghuni::whereNotIn('id', $penghuniTerdaftar)->get();

        return view('admin.PenggunaSistem.create', ['dataPenghuni' => $data]);
    }

    public function store(Request $request)
    {
        $message = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute sudah digunakan',
            'numeric' => ':attribute harus berupa angka',
            'in' => ':attribute harus salah satu dari :values',
            'id_penghuni' => 'required_if:level,penghuni|exists:data_penghuni,id',
        ];

        $pengguna = new pengguna_sistem();
        $pengguna->level = $request->level;
        $pengguna->username = $request->username;
        $pengguna->password = Hash::make($request->password);

        if ($request->level === 'penghuni') {
            $dataPenghuni = data_penghuni::where('id', $request->id_penghuni)->first();
            if ($dataPenghuni) {
                $pengguna->id_penghuni = $request->id_penghuni;
                $pengguna->nama_pengguna = $dataPenghuni->nama;
            } else {
                return redirect()->back()->with('error', 'Id penghuni tidak valid.');
            }
        } elseif ($request->level === 'admin') {
            $pengguna->nama_pengguna = $request->nama_pengguna;
            $pengguna->id_penghuni = null;
        }
        $pengguna->save();

        return redirect('/Pengguna-Sistem')->with('success', 'Pengguna berhasil ditambahkan.');
    }


    public function edit($username)
    {
        $pengguna = pengguna_sistem::where('username', $username)->firstOrFail();
        return view('admin.PenggunaSistem.edit', compact('pengguna'));
    }

    public function update(Request $request, $username){

        $pengguna = pengguna_sistem::where('username', $username)->firstOrFail();

        $message = [
            'required' => ':attribute tidak boleh kosong',
            'numeric' => ':attribute harus berupa angka',
        ];

        $validateData = $request->validate([
            'username' => 'required',
            'password' => 'nullable',
        ], $message);

        $pengguna->username = $request->username;
        $pengguna->password = $request->password ? Hash::make($request->password) : $pengguna->password;
        $pengguna->save();

        return redirect('/Pengguna-Sistem')->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function destroy($username){
        $pengguna = pengguna_sistem::where('username', $username)->firstOrFail();
        $pengguna->delete();

        return redirect('/Pengguna-Sistem')->with('success', 'Pengguna berhasil dihapus.');
    }
}
