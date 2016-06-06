<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table="customers";

    protected $fillable = ['name', 'email', 'phone', 'fax', 'post_code'];

    public function order (){
    	return $this->hasMany('App\Order');
    }
}
