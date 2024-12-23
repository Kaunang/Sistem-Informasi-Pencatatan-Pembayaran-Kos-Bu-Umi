<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\data_kamar;
use Illuminate\Support\Facades\DB;


class DataKamarController extends Controller
{
    public function index(){
        // Ambil data kamar dan cek status berdasarkan data_penghuni
        $datakamar = data_kamar::leftJoin('data_penghuni', 'data_kamar.id', '=', 'data_penghuni.id_kamar')
                        ->select('data_kamar.*', 
                                 DB::raw('CASE WHEN data_penghuni.id_kamar IS NULL THEN "Kosong" ELSE "Terisi" END as status_kamar'))
                        ->get();
    
        return view('admin.DataKamar.index', compact('datakamar'));
    }
    

    public function create(){

        $lastKamar = data_kamar::orderBy('id', 'desc')->first();
        if ($lastKamar) {
            $lastNumber = (int)substr($lastKamar->id, 3);
            $newIdNumber = $lastNumber + 1;
        } else {
            $newIdNumber = 1; 
        }

        $newId = 'KAM' . str_pad($newIdNumber, 2, '0', STR_PAD_LEFT); 

        return view('admin.DataKamar.create', compact('newId'));
    }
    public function store(Request $request){
        $message=[
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute sudah digunakan',
            'numeric' => ':attribute harus berupa angka',
        ];

        $validtaeData = $request->validate([
            'id' => 'required|string|unique:data_kamar,id',
            'kapasitas' => 'required|integer|min:1',
            'fasilitas' => 'required|string|max:255',
            'tarif' => 'required|numeric|min:0',
        ],$message);

        $data = new data_kamar();
        $data->id = $request->id;
        $data->kapasitas =$request->kapasitas;
        $data->fasilitas =$request->fasilitas;
        $data->tarif =$request->tarif;
        $data->save();
        return redirect('/Data-Kamar')->with('success', 'Data Berhasil Disimpan');
    }
    public function edit($id){
        $datakamar = data_kamar::find($id);
        return view('admin.DataKamar.edit', compact('datakamar'));
    }

    public function update(Request $request, $id){
        $message = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute sudah digunakan',
            'numeric' => ':attribute harus berupa angka',
        ];

        $data = data_kamar::findOrFail($id);

        $validateData = $request->validate([
            'id' => [
                'required',
                function ($attribute, $value, $fail) use ($data) {
                    if ($value !== $data->id && data_kamar::where('id', $value)->exists()) {
                        $fail('ID sudah digunakan');
                    }
                },
            ],
            'kapasitas' => 'required',
            'fasilitas' => 'required',
            'tarif' => 'required|numeric'
        ], $message);

        $data->kapasitas = $request->kapasitas;
        $data->fasilitas = $request->fasilitas;
        $data->tarif = $request->tarif;
        $data->save(); 
        return redirect('/Data-Kamar')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id){
        $data = data_kamar::find($id);
        $data->delete();
        return redirect('/Data-Kamar')->with('success', 'Data Berhasil Dihapus');
    }

}
