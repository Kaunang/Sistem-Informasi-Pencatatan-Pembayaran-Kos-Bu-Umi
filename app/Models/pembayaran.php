<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    protected $fillable = ['id_pembayaran', 'bulan_tahun', 'status', 'tgl_bayar'];

    public function data_kamar(){
        return $this->belongsTo(data_kamar::class, 'id_kamar');
    }

    public function data_penghuni(){
        return $this->belongsTo(data_penghuni::class, 'id_penghuni');
    }
}
