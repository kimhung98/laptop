<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiSp extends Model
{
    protected $table= "loaisp";

    public function theloai()
    {
        return $this->belongsTo('App\TheLoai','idTheLoai','id');
    }

    public function sanpham()
    {
        return $this->hasMany('App\SanPham','idLoaiSp','id');
    }
}
