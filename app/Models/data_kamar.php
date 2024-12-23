<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class data_kamar extends Model
{
    protected $table = 'data_kamar';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id', 'kapasitas', 'fasilitas', 'tarif'];

    public function data_penghuni(){
        return $this->HasMany(data_penghuni::class);
    }

    public function pembayaran(){
        return $this->HasMany(pembayaran::class);
    }
}
