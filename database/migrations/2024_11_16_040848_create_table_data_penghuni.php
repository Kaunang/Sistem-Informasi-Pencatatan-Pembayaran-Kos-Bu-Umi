<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('data_penghuni', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->string('nama', 100);
            $table->string('alamat', 255);
            $table->string('no_hp', 15);
            $table->date('registrasi');
            $table->string('id_kamar', 10);
            $table->foreign('id_kamar')->references('id')->on('data_kamar')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_penghuni');
    }
};
