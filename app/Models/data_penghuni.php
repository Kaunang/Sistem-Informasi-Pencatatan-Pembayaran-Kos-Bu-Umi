<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class data_penghuni extends Model
{
    use HasFactory;
    protected $table='data_penghuni';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable=['id', 'nama', 'alamat','no_hp','registrasi','no_hp'];

    public function data_kamar(){
        return $this->belongsTo(data_kamar::class, 'id_kamar');
    }
    
    public function pengguna_sistem(){
        return $this->HasMany(pengguna_sistem::class);
    }

    public function pembayaran(){
        return $this->HasMany(pembayaran::class);
    }
}

