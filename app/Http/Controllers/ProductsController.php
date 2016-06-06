<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductRequest;
use Request;
use Validator,File,Input,Auth, DB;
use App\Category;
use App\Product;
use App\ProductImage;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;

class ProductsController extends Controller
{

    public function getList(){
        $products = DB::table('products')->paginate(5);
        $categories = Category::all();
        $product_imgs = ProductImage::all();
        return view('admin.products.showListProduct', compact('products', 'categories', 'product_imgs'));
    }

    public function getAdd(){
    	$categories = Category::select('id', 'name', 'parent_id')->get()->toArray();
    	return view('admin.products.uploadNewProduct')->with('categories', $categories);
    }

    public function postAdd(ProductRequest $request){
    	$product = new Product;
    	$data_input = $request->all();
    	$product->cate_id = $data_input['cate_id'];
    	$product->name = $data_input['name'];
        $product->slug = convert_to_slug($product->name);
    	$product->description = $data_input['description'];
    	$product->price = $data_input['price'];
        // namespace function convert_to_slug: app\MyFunction\functions.php
    	$product->image = convert_to_slug($product->name).'_'.rand(0,9999).'.'. $request->file('image')->getClientOriginalExtension(); 
        //set $product->image la (ten user_rand(0,99999)+duoi anh)
        $request->file('image')->move(public_path().'/image/products', $product->image);
        // luu anh da dc set ten vao thu muc public/image/products
    	$product->availability = 1;
    	$product->save();
        if (Input::hasFile('fProductDetail')){
            $count = 1;
            foreach (Input::file('fProductDetail') as $file){
                $product_img = new ProductImage();
                if (isset($file)){
                    $product_img->title = convert_to_slug($product->name).'_detail_'.rand(0,9999).'.'. $file->getClientOriginalExtension();
                    $product_img->slug = convert_to_slug($product->name).'_detail_'.rand(0,9999);
                    $product_img->alt = $product_img->title;
                    $count++;
                    $product_img->product_id = $product->id;
                    $file->move(public_path().'/image/products/detail/', $product_img->title);
                    $product_img->save();
                }
            }
        }
    	return redirect('admin/products/list')->with('successMessage', 'Tạo sản phẩm mới thành công!');
    }

    public function getEdit($id){
        $product = Product::findOrFail($id)->toArray();
        $categories = Category::select('id', 'name', 'parent_id')->get()->toArray();
        $product_imgs = Product::findOrFail($id)->pImage;
        return view('admin.products.editProduct', compact('product', 'categories', 'product_imgs'));
    }

    public function postEdit($id, Request $request){
    	$product = Product::findOrFail($id);
    	$product->cate_id = Request::input('cate_id');
    	$product->name = Request::input('name');
        $product->slug = convert_to_slug($product->name);
    	$product->description = Request::input('description');
        if(Input::hasFile('image')){
            $file = Input::file('image');
            File::delete(public_path().'/image/products/'.$product->image); 
            // xoa file anh cu trong thu muc public/image/products/
            // namespace function convert_to_slug: app\MyFunction\functions.php
            $product->image = convert_to_slug($product->name).'_'.rand(0,9999).'.'.$file->getClientOriginalExtension(); 
            //set $product->image la (ten user_rand(0,99999)+duoi anh)
            $file->move(public_path().'/image/products/', $product->image);
            // luu anh da dc set ten vao thu muc public/image/products/
        }
        if (Input::hasFile('fProductDetail')){
            foreach (Input::file('fProductDetail') as $file){
                $product_img = new ProductImage();
                if (isset($file)){
                    $product_img->title = convert_to_slug($product->name).'_detail_'.rand(0,9999).'.'. $file->getClientOriginalExtension();
                    $product_img->slug = convert_to_slug($product->name).'_detail_'.rand(0,9999);
                    $product_img->alt = $product_img->title;
                    $product_img->product_id = $product->id;
                    $file->move(public_path().'/image/products/detail/', $product_img->title);
                    $product_img->save();
                }
            }
        }
    	$product->price = Request::input('price');
    	$product->availability = Request::input('availability');
    	$product->save();

    	return redirect('admin/products/list')->with('successMessage', 'Cập nhật thành công!');;
    }

    public function del($id){
    	$product = Product::findOrFail($id);
        $product_img = Product::findOrFail($id)->pImage->toArray();
        File::delete(public_path().'/image/products/'.$product->image);
        foreach($product_img as $item){
            File::delete(public_path().'/image/products/detail/'.$item['title']);
        }
    	$product->delete();
        return redirect('admin/products/list')->with('successMessage', 'Xóa sản phẩm thành công!');
    }

    public function setAvailability($id, $availability){
    	$product = Product::findOrFail($id);
        if($availability == 1)
            $product->availability = 0;
        else
            $product->availability = 1;
        $product->save();
        return redirect('admin/products/list');
    }

    public function getDelImg($id){
        if(Request::ajax()){
            $img_id = (int)Request::get('idHinh');
            $image_detail = ProductImage::find($img_id);
            if(!empty($image_detail)){
                $img = public_path().'/image/products/detail/'.$image_detail->title;
                if(File::exists($img)){
                    File::delete($img);
                }
                $image_detail->delete();
            }
            return "ok";
        }
    }
}