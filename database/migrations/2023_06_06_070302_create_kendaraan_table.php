<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKendaraanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("merk_id");
            $table->unsignedBigInteger("baterai_id");
            $table->string("nama_kendaraan");
            $table->string("deskripsi");
            $table->integer("tahun_produksi");
            $table->double("harga");
            $table->double("jarak_tempuh");
            $table->boolean("is_active");

            $table->timestamps();
            $table->foreign('merk_id')->references('id')->on('merk');
            $table->foreign('baterai_id')->references('id')->on('baterai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kendaraan');
    }
}
