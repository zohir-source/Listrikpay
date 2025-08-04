<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Livewire\Attributes\On;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id('id_pelanggan');
            $table->string('username', 50);
            $table->string('password', 50);
            $table->string('nomor_kwh', 30);
            $table->string('nama_pelanggan', 100);
            $table->text('alamat');
            $table->unsignedBigInteger('id_tarif');
            $table->foreign('id_tarif')->references('id_tarif')->on('tarif');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggan');
    }
};
