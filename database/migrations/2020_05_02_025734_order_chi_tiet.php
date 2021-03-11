<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderChiTiet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_ct', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idOrder')->unsigned();
            $table->foreign('idOrder')->references('id')->on('order');
            $table->integer('idSanPham')->unsigned();
            $table->foreign('idSanPham')->references('id')->on('sanpham');
            $table->string('TenSp');
            $table->integer('SoLuong');
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
        Schema::drop('order_ct');
    }
}
