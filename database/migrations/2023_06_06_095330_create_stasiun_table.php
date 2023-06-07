<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStasiunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stasiun', function (Blueprint $table) {
            $table->id();
            $table->string('nama_stasiun');
            $table->text('alamat_stasiun');
            $table->text('fasilitas');
            $table->string('longitude');
            $table->string('latitude');
            $table->unsignedBigInteger("provinsi_id");
            $table->unsignedBigInteger("kota_id");

            $table->timestamps();
            $table->foreign('provinsi_id')->references('id')->on('provinsi');
            $table->foreign('kota_id')->references('id')->on('kota');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stasiun');
    }
}
