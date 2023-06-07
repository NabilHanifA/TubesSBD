<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("kendaraan_id");
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("status_pesanan_id");
            $table->timestamp("tgl_pemesanan");

            $table->timestamps();
            $table->foreign('kendaraan_id')->references('id')->on('kendaraan');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('status_pesanan_id')->references('id')->on('status_pesanan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanan');
    }
}
