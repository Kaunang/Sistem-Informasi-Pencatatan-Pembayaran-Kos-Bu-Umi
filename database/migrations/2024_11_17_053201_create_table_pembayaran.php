<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->bigIncrements('id_pembayaran');
            $table->string('id_penghuni', 10);
            $table->string('id_kamar', 10);
            $table->string('bulan_tahun', 7);
            $table->enum('status', ['belum bayar', 'lunas'])->default('belum bayar');
            $table->date('tgl_bayar')->nullable();
            $table->timestamps();

            $table->foreign('id_penghuni')->references('id')->on('data_penghuni')->onDelete('cascade');
            $table->foreign('id_kamar')->references('id')->on('data_kamar')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
};
