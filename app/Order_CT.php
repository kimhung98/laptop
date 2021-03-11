<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_CT extends Model
{
    protected $table= "order_ct";

    public function order()
    {
        return $this->belongsTo('App\Order','idOrder','id');
    }

    public function sanpham()
    {
        return $this->belongsTo('App\SanPham','idSanPham','id');
    }
}
