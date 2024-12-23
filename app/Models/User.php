<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'pengguna_sistem';

    protected $fillable = [
        'name',
        'username', // menggunakan username untuk login
        'password',
        'level',
        'id_penghuni',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Menentukan kolom yang digunakan untuk login.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'username'; // Menggunakan 'username' sebagai kolom untuk login
    }
}
