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
        Schema::table('tagihan', function (Blueprint $table) {
            //
            $table->index('id_pelanggan');
            $table->index(['bulan','tahun']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tagihan', function (Blueprint $table) {
            //
            $table->dropIndex('id_pelanggan');
            $table->dropIndex(['bulan','tahun']);
        });
    }
};
