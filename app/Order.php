<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table= "order";

    public function customer()
    {
        return $this->belongsTo('App\Customers','idCustomer','id');
    }

    public function order_ct()
    {
        return $this->hasMany('App\Order_CT','idOrder','id');
    }
}
