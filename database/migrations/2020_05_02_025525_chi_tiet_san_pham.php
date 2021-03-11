<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChiTietSanPham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitiet', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idSanPham')->unsigned();
            $table->foreign('idSanPham')->references('id')->on('sanpham');
            $table->string('CPU');
            $table->string('RAM');
            $table->string('OCung');
            $table->string('ManHinh');
            $table->string('ThietKe');
            $table->string('KichThuoc');
            $table->string('NamRaMat');
            $table->string('Hinh1');
            $table->string('Hinh2');
            $table->string('Hinh3');
            $table->string('Hinh4');
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
        Schema::drop('chitiet');
    }
}
