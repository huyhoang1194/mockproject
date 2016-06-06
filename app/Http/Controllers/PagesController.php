<?php

namespace App\Http\Controllers;
use App\Category;
use Request;
use DB,Cart,Validator;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function getHomePage(){
        $contentCart = Cart::content();
        $total = Cart::total();
    	$products = DB::table('products')->select('id', 'name', 'image', 'price', 'slug')->orderBy('id', 'ASC')->get();
    	$new_products = DB::table('products')->select('id', 'name', 'image', 'price', 'slug')->orderBy('created_at', 'DESC')->get();
    	$recommended = DB::table('products')->select('id', 'name', 'image', 'price', 'slug')->orderBy('price', 'ASC')->skip(0)->take(5)->get();
    	return view('pages.home', compact('products', 'new_products', 'recommended', 'contentCart', 'total'));
    }

    public function category($id){
        $cate = Category::findOrFail($id);
        $contentCart = Cart::content();
        $total = Cart::total();
        $recommended = DB::table('products')->select('id', 'name', 'image', 'price', 'slug')->orderBy('price', 'ASC')->skip(0)->take(3)->get();
    	$product_cate = DB::table('products')->select('id', 'name', 'image', 'price', 'slug', 'cate_id')->where('cate_id', $id)->paginate(9);
    	return view('pages.product-list', compact('cate', 'product_cate', 'contentCart', 'total', 'recommended'));
    }

    public function getProductDetail($id){
        $contentCart = Cart::content();
        $total = Cart::total();
        $cate = Category::findOrFail($id);
    	$product_detail = DB::table('products')->where('id', $id)->first();
    	$image_detail = DB::table('product_images')->where('product_id',$product_detail->id)->get();
        $recommended = DB::table('products')->select('id', 'name', 'image', 'price', 'slug')->orderBy('price', 'ASC')->skip(0)->take(3)->get();
    	return view('pages.product-detail', compact('cate', 'product_detail', 'image_detail', 'contentCart', 'total', 'recommended'));
    }

    public function add2cartfast($id, Request $request){
        $buy = DB::table('products')->where('id', $id)->first();
        if($buy->availability == 1){
            Cart::add(array('id'=>$id, 'name'=>$buy->name, 'qty'=>1, 'price'=>$buy->price, 'options'=>array('img'=>$buy->image, 'slug'=>$buy->slug, 'size'=>36)));
            return redirect()->route('viewcart')->with('successMessage', 'Thêm sản phẩm vào giỏ hàng thành công!');
        }else{
            return redirect()->route('viewcart')->with('errorMessage', 'Sản phẩm tạm thời đang hết hàng, mong quý khách thông cảm!');
        }
    }

    public function add2cart($id, Request $request){
    	$buy = DB::table('products')->where('id', $id)->first();
        $size = Request::input('size');
        $qty = Request::input('qty');
        if($buy->availability == 1){
            Cart::add(array('id'=>$id, 'name'=>$buy->name, 'qty'=>$qty, 'price'=>$buy->price, 'options'=>array('img'=>$buy->image, 'slug'=>$buy->slug, 'size'=>$size)));
            return redirect()->route('viewcart')->with('successMessage', 'Thêm sản phẩm vào giỏ hàng thành công!');
        }else{
            return redirect()->route('viewcart')->with('errorMessage', 'Sản phẩm tạm thời đang hết hàng, mong quý khách thông cảm!');
        }
    }

    public function viewcart(){
    	$contentCart = Cart::content();
    	$total = Cart::total();
    	$recommended = DB::table('products')->select('id', 'name', 'image', 'price', 'slug')->orderBy('price', 'ASC')->skip(0)->take(5)->get();
    	return view('pages.shopping-cart', compact('contentCart', 'total', 'recommended'));
    }

    public function del_product_cart($id){
    	Cart::remove($id);
    	return redirect()->route('viewcart')->with('successMessage', 'Xóa sản phẩm khỏi giỏ hàng thành công!');;
    }

    public function del_product_cart_2($id){
        Cart::remove($id);
        return redirect()->route('checkout');
    }

    public function del_cart(){
        Cart::destroy();
        return redirect()->route('viewcart')->with('successMessage', 'Xóa giỏ hàng thành công!');;
    } 

    public function update_cart($id, $qty, $size){
        if(Request::ajax()){
            $id = Request::get('id');
            $qty = Request::get('qty');
            $size = Request::get('size');
            Cart::update($id, array('qty'=>$qty, 'options'=>array('size'=>$size)));
            echo "ok";
        }
    }


}