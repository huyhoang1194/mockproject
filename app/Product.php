<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table="products";

    protected $fillable = ['name', 'slug', 'price', 'intro', 'content','image', 'keyword', 'description', 'user_id','cate_id', 'brand_id'];
    
    public static $rules = array(
    	'cate_id' => 'required|integer',
    	'name' => 'required|min:2',
    	'description' => 'required',
    	'price' => 'required|numeric',
    	'availibility' => 'integer'
    );

    public function category (){
    	return $this->belongsTo('App\Category');
    }

    public function pImage (){
        return $this->hasMany('App\ProductImage');
    }
}
