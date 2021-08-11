<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhanvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->increments('id_NV');

            $table->integer('id_BP')->unsigned();
            $table->foreign('id_BP')->references('id_BP')->on('bophan')->onDelete('cascade');

            $table->string('ten');
            $table->date('ngay_sinh');
            $table->string('dia_chi');
            $table->string('sdt');
            $table->string('email')->nullable(); 
            $table->string('pass');

            $table->integer('id_roles')->unsigned();
            $table->foreign('id_roles')->references('id_roles')->on('roles')->onDelete('cascade');

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
