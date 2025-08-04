<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id('id_pembayaran');
            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_tagihan');
            $table->date('tanggal_pembayaran');
            $table->string('bulan_bayar',20);
            $table->integer('biaya_admin');
            $table->integer('total_bayar');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan');
            $table->foreign('id_tagihan')->references('id_tagihan')->on('tagihan');
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
