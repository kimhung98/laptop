<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTiet extends Model
{
    protected $table= "chitiet";

    public function sanpham()
    {
        return $this->belongsTo('App\SanPham','idSanPham','id');
    }
}
