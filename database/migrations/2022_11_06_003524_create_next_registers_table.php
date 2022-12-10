<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNextRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('next_registers', function (Blueprint $table) {
            $table->id();
            $table->string('lokasi_toko', 200);
            $table->string('foto_toko', 300);
            $table->string('foto_ktp', 300);
            $table->string('sertefikat_toko', 300);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('next_registers');
    }
}
