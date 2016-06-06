<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart,DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function postSearch(Request $request){
        $keyword = $request->input('search');
        $contentCart = Cart::content();
        $total = Cart::total();
        $product_search = DB::table('products')->select('id', 'name', 'image', 'price', 'slug', 'cate_id')->where('name', 'like', '%'.$keyword.'%')->paginate(9);
        return view('pages.search-result', compact('product_search', 'contentCart', 'total'));
    }
}
