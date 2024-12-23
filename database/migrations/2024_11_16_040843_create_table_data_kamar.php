<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('data_kamar', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->integer('kapasitas');
            $table->text('fasilitas');
            $table->decimal('tarif', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_kamar');
    }
};
