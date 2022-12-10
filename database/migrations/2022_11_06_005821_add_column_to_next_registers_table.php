<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToNextRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('next_registers', function (Blueprint $table) {
            $table->unsignedBigInteger('penjual_id')->after('id');
            $table->foreign('penjual_id')->references('id')->on('penjuals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('next_registers', function (Blueprint $table) {
            //
        });
    }
}
