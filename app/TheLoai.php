<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    protected $table= "theloai";

    public function loaisp()
    {
        return $this->hasMany('App\LoaiSp','idTheLoai','id');
    }

    public function sanpham()
    {
        return $this->hasManyThrough('App\SanPham','App\LoaiSp','idTheLoai','idLoaiSp','id');
    }
}
