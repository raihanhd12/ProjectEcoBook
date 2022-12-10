<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToTransaksis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksis', function (Blueprint $table) {
            $table->unsignedBigInteger('penjual_id')->after('id');
            $table->foreign('penjual_id')->references('id')->on('penjuals')->onDelete('cascade');
            $table->string('status')->after('penjual_id');
            $table->string('nama_buku_keranjang')->after('status');
            $table->string('quantity_keranjang')->after('nama_buku_keranjang');
            $table->string('price_keranjang')->after('quantity_keranjang');
            $table->string('first_name_keranjang')->after('price_keranjang');
            $table->string('last_name_keranjang')->after('first_name_keranjang');
            $table->string('email_keranjang')->after('last_name_keranjang');
            $table->string('transaction_id')->after('email_keranjang');
            $table->string('order_id')->after('transaction_id');
            $table->string('gross_amount')->after('order_id');
            $table->string('payment_type')->after('gross_amount');
            $table->string('transaction_time')->nullable()->after('payment_type');
            $table->string('payment_code')->nullable()->after('transaction_time');
            $table->string('pdf_url')->nullable()->after('payment_code');
            $table->integer('level')->default(1)->after('pdf_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksis', function (Blueprint $table) {
            //
        });
    }
}
