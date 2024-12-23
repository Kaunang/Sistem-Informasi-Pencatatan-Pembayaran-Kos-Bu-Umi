<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pengguna_sistem', function (Blueprint $table) {
            $table->string('username', 50)->primary();
            $table->string('nama_pengguna', 100);
            $table->string('password');
            $table->enum('level', ['admin', 'penghuni']);
            $table->string('id_penghuni', 10)->nullable();
            $table->timestamps();

            $table->foreign('id_penghuni')->references('id')->on('data_penghuni')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengguna_sistem');
    }
};
