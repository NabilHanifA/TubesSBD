<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryStatusPesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_status_pesanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("pesanan_id");
            $table->unsignedBigInteger("status_pesanan_id");

            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pesanan_id')->references('id')->on('pesanan');
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
        Schema::dropIfExists('history_status_pesanan');
    }
}
