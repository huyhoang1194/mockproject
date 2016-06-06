<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table="orders";

    protected $fillable = ['user_id', 'required_date', 'status'];

    public function order_detail (){
        return $this->hasMany('App\OrderDetail');
    }
}