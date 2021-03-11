<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SanPham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->increments('id');
            $table->string('TenSp');
            $table->string('Hinh');
            $table->integer('GiaTien');
            $table->integer('GiamGia');
            $table->integer('NoiBat')->default(0);
            $table->longText('MoTa');
            $table->integer('soluong');
            $table->integer('idLoaiSp')->unsigned();
            $table->foreign('idLoaiSp')->references('id')->on('loaisp');
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
        Schema::drop('sanpham');
    }
}
