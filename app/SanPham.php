<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table= "sanpham";

    public function loaisp()
    {
        return $this->belongsTo('App\LoaiSp','idLoaiSp','id');
    }

    public function chitiet()
    {
        return $this->hasOne('App\ChiTiet','idSanPham','id');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment','idSanPham','id');
    }

    public function order_ct()
    {
        return $this->hasMany('App\Order_CT','idSanPham','id');
    }

    public function kho()
    {
        return $this->hasOne('App\Kho','idSanPham','id');
    }

}
