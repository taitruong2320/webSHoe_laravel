<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChungtuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chungtu', function (Blueprint $table) {
            $table->increments('id_HD');

            $table->integer('id_KH')->unsigned();
            $table->foreign('id_KH')->references('id_KH')->on('khachhang')->onDelete('cascade');

            $table->string('content')->nullable();

            $table->integer('id_NV')->unsigned();
            $table->foreign('id_NV')->references('id_NV')->on('nhanvien')->onDelete('cascade');

            $table->string('so_tien');
            $table->string('thue');
            $table->string('noi_dung');
            $table->string('ngay');
            $table->string('nguoi_nhan');
            $table->string('dia_chi');
            $table->string('sdt');

            $table->integer('id_nhaVC')->unsigned();
            $table->foreign('id_nhaVC')->references('id_nhaVC')->on('nhavanchuyen')->onDelete('cascade');

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
        Schema::dropIfExists('nhanvien');
    }
}
