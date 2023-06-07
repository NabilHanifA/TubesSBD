<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("pesanan_id");
            $table->unsignedBigInteger("user_id");
            $table->timestamp("tgl_pembayaran");
            $table->integer("jmlh_pembayaran");
            $table->string("metode_pembayaran");
            $table->string("status_pembayaran");
            
            $table->timestamps();
            $table->foreign('pesanan_id')->references('id')->on('pesanan');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
}
