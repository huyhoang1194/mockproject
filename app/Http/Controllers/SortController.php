<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Cart,DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SortController extends Controller
{
    public function getSortNameAsc($id){
        $product_cate = DB::table('products')->select('id', 'name', 'image', 'price', 'slug', 'cate_id')->where('cate_id', $id)->orderBy('name', 'asc')->paginate(9);
        $cate = Category::findOrFail($id);
        $contentCart = Cart::content();
        $total = Cart::total();
        $recommended = DB::table('products')->select('id', 'name', 'image', 'price', 'slug')->orderBy('price', 'ASC')->skip(0)->take(3)->get();
        return view('pages.product-list', compact('cate', 'product_cate', 'contentCart', 'total', 'recommended'));
    }

    public function getSortNameDesc($id){
        $product_cate = DB::table('products')->select('id', 'name', 'image', 'price', 'slug', 'cate_id')->where('cate_id', $id)->orderBy('name', 'desc')->paginate(9);
        $cate = Category::findOrFail($id);
        $contentCart = Cart::content();
        $total = Cart::total();
        $recommended = DB::table('products')->select('id', 'name', 'image', 'price', 'slug')->orderBy('price', 'ASC')->skip(0)->take(3)->get();
        return view('pages.product-list', compact('cate', 'product_cate', 'contentCart', 'total', 'recommended'));
    }

    public function getSortPriceAsc($id){
        $product_cate = DB::table('products')->select('id', 'name', 'image', 'price', 'slug', 'cate_id')->where('cate_id', $id)->orderBy('price', 'asc')->paginate(9);
        $cate = Category::findOrFail($id);
        $contentCart = Cart::content();
        $total = Cart::total();
        $recommended = DB::table('products')->select('id', 'name', 'image', 'price', 'slug')->orderBy('price', 'ASC')->skip(0)->take(3)->get();
        return view('pages.product-list', compact('cate', 'product_cate', 'contentCart', 'total', 'recommended'));
    }

    public function getSortPriceDesc($id){
        $product_cate = DB::table('products')->select('id', 'name', 'image', 'price', 'slug', 'cate_id')->where('cate_id', $id)->orderBy('price', 'desc')->paginate(9);
        $cate = Category::findOrFail($id);
        $contentCart = Cart::content();
        $total = Cart::total();
        $recommended = DB::table('products')->select('id', 'name', 'image', 'price', 'slug')->orderBy('price', 'ASC')->skip(0)->take(3)->get();
        return view('pages.product-list', compact('cate', 'product_cate', 'contentCart', 'total', 'recommended'));
    }

    public function getSortNewest($id){
        $product_cate = DB::table('products')->select('id', 'name', 'image', 'price', 'slug', 'cate_id')->where('cate_id', $id)->orderBy('created_at', 'desc')->paginate(9);
        $cate = Category::findOrFail($id);
        $contentCart = Cart::content();
        $total = Cart::total();
        $recommended = DB::table('products')->select('id', 'name', 'image', 'price', 'slug')->orderBy('price', 'ASC')->skip(0)->take(3)->get();
        return view('pages.product-list', compact('cate', 'product_cate', 'contentCart', 'total', 'recommended'));
    }
}
