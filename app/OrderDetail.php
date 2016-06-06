<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table="order_details";

    protected $fillable = ['quantity', 'price_each', 'size'];

    public function order (){
        return $this->belongsTo('App\Order');
    }
}