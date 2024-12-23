<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\data_kamar;
use App\Models\data_penghuni;
use Illuminate\Support\Facades\Storage;

class DataPenghuniController extends Controller
{
    public function index(){
        $data = data_penghuni::all();
            return view('admin.DataPenghuni.index', ['data_penghuni' => $data]);
    }

    public function create(){
        $lastId = data_penghuni::orderBy('id', 'desc')->first();
    
        if ($lastId) {
            $lastNumber = (int) substr($lastId->id, 1); 
            $newId = 'P' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT); 
        } else {
            $newId = 'P001';
        }
    
        $kamar = data_kamar::all();
    
        return view('admin.DataPenghuni.create', compact('kamar', 'newId'));
    }
    

    public function store(Request $request){

        $message=[
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute sudah digunakan',
            'numeric' => ':attribute harus berupa angka',
        ];

        $validateData = $request->validate([
            'id' => 'required|unique:data_penghuni',
            'nama' => 'required:data_penghuni',
            'alamat' => 'required:data_penghuni',
            'no_hp' => 'required|numeric:data_penghuni',
            'registrasi' => 'required:data_penghuni',
            'id_kamar' => 'required|unique:data_penghuni',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ],$message);

        $foto = null;

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('public');
        }

        $data = new data_penghuni();
        $data->id = $request->id;
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->no_hp = $request->no_hp;
        $data->registrasi = $request->registrasi;
        $data->id_kamar = $request->id_kamar;
        $data->foto = str_replace('public/', '', $path);
        $data->save();
        return redirect('/Data-Penghuni')->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($id){
        $data = data_penghuni::find($id);
        $kamar = data_kamar::all();
        return view('admin.DataPenghuni.edit', ['data' => $data, 'kamar' => $kamar]); 
    }
    
    public function update(Request $request, $id){
    $message = [
        'required' => ':attribute tidak boleh kosong',
        'unique' => ':attribute sudah digunakan',
        'numeric' => ':attribute harus berupa angka',
    ];

    $data = data_penghuni::find($id);

    $validateData = $request->validate([
        'id' => 'required',
        'nama' => 'required',
        'alamat' => 'required',
        'no_hp' => 'required|numeric',
        'registrasi' => 'required',
        'id_kamar' => [
            'required',
            function ($attribute, $value, $fail) use ($data) {
                if ($value !== $data->id_kamar && data_penghuni::where('id_kamar', $value)->exists()) {
                    $fail('ID Kamar sudah digunakan');
                }
            },
        ],
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ], $message);

    // Proses file foto
    $path = $data->foto; // Gunakan foto lama secara default
    if ($request->hasFile('foto')) {
        // Hapus foto lama jika ada
        if (Storage::exists('public/' . $data->foto)) {
            Storage::delete('public/' . $data->foto);
        }
        // Simpan foto baru
        $path = $request->file('foto')->store('public');
        $path = str_replace('public/', '', $path); // Simpan path tanpa prefix 'public/'
    }

    // Update data penghuni
    $data->id = $request->id;
    $data->nama = $request->nama;
    $data->alamat = $request->alamat;
    $data->no_hp = $request->no_hp;
    $data->registrasi = $request->registrasi;
    $data->id_kamar = $request->id_kamar;
    $data->foto = $path; // Gunakan path foto yang baru atau tetap lama
    $data->update();

    return redirect('/Data-Penghuni')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id){
    $data = data_penghuni::find($id);
    
    if (!$data) {
        return redirect('/Data-Penghuni')->with('error', 'Data tidak ditemukan');
    }
    
    // Hapus file foto dari storage jika ada
    if (Storage::exists('public/' . $data->foto)) {
        Storage::delete('public/' . $data->foto);
    }

    // Hapus data dari database
    $data->delete();

    return redirect('/Data-Penghuni')->with('success', 'Data Berhasil Dihapus');
    }


    public function detail($id) {
        $data = data_penghuni::find($id); 
        if (!$data) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
        return view('admin.DataPenghuni.detail', ['data_penghuni' => $data]);
    }
}
