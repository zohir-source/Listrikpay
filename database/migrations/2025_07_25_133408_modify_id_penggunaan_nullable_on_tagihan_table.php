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
        $table->unsignedBigInteger('id_penggunaan')->nullable()->change();
    });
}

public function down()
{
    Schema::table('tagihan', function (Blueprint $table) {
        $table->unsignedBigInteger('id_penggunaan')->nullable(false)->change();
    });
}
};
