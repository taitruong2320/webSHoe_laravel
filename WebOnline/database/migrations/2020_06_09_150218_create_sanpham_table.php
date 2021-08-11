<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->increments('id_SP');

            $table->integer('id_nhom')->unsigned();
            $table->foreign('id_nhom')->references('id_nhom')->on('nhomsanpham')->onDelete('cascade');

            $table->string('ten_SP');
            $table->string('gia');
            $table->string('so_luong');
            $table->string('hinh')->nullable();

            $table->integer('id_nhaCC')->unsigned();
            $table->foreign('id_nhaCC')->references('id_nhaCC')->on('nhaCC')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanpham');
    }
}
