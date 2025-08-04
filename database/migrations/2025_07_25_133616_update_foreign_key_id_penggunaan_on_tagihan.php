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
    Schema::table('tagihan', function (Blueprint $table) {
        // Hapus FK lama dulu (pastikan nama constraint kamu benar)
        $table->dropForeign(['id_penggunaan']);

        // Tambahkan ulang FK dengan ON DELETE SET NULL
        $table->foreign('id_penggunaan')
              ->references('id_penggunaan')
              ->on('penggunaan')
              ->onDelete('set null');
    });
}

public function down()
{
    Schema::table('tagihan', function (Blueprint $table) {
        $table->dropForeign(['id_penggunaan']);

        $table->foreign('id_penggunaan')
              ->references('id_penggunaan')
              ->on('penggunaan')
              ->onDelete('restrict');
    });
}
};
