<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pengguna_sistem extends Model
{
    use HasFactory;
    protected $table='pengguna_sistem';
    protected $primaryKey='username';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable=['username', 'nama_pengguna', 'password', 'level'];

    public function data_penghuni(){
        return $this->belongsTo(data_penghuni::class, 'id_penghuni');
    }
}
