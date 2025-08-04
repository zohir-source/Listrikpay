<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterIdUserNullableOnPembayaranTable extends Migration
{
    public function up()
    {
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->unsignedBigInteger('id_user')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->unsignedBigInteger('id_user')->nullable(false)->change();
        });
    }
}