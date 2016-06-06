<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Cart,Validator,DB,Mail,Auth;
use App\Order;
use App\User;
use App\OrderDetail;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function getList(){
        $orders = DB::table('orders')->paginate(5);
        return view('admin.orders.showListOrders', compact('orders'));
    }

    public function getCheckout(){
        $contentCart = Cart::content();
        $total = Cart::total();
        return view('pages.checkout', compact('contentCart', 'total'));
    }

    public function postCheckout(Request $request){
        
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'address_1' => 'required',
            'required_date' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('checkout')->withErrors($validator)->withInput();
        }  
        $order = new Order;
        if(Auth::guest()){
            $data_input = $request->all();  
            $order->user_id = 0;
            $order->customer_name = $data_input["customer_name"];             
            $order->email = $data_input["email"];
            $order->phone = $data_input["phone"];
            $order->fax = $data_input["fax"];
            $order->post_code = $data_input["post_code"];
            $order->address_1 = $data_input["address_1"];
            $order->address_2 = $data_input["address_2"];
            $order->status = 0;
            $order->required_date = $data_input["required_date"];
            $total = Cart::total();
            $order->total = $total;
            $order->save();
            $contentCart = Cart::content();
            foreach($contentCart as $item){
                $order_detail = new OrderDetail;
                $order_detail->order_id = $order->id;
                $order_detail->product_id = $item->id;
                $order_detail->price_each = $item->price;
                $order_detail->quantity = $item->qty;
                $order_detail->size = $item['options']->size;
                $order_detail->save();
            }
        }
        else{
            $data_input = $request->all(); 
            $order->user_id = Auth::user()->id;
            $order->customer_name = $data_input["customer_name"];             
            $order->email = $data_input["email"];
            $order->phone = $data_input["phone"];
            $order->fax = $data_input["fax"];
            $order->post_code = $data_input["post_code"];
            $order->address_1 = $data_input["address_1"];
            $order->address_2 = $data_input["address_2"];
            $order->status = 0;
            $order->required_date = $data_input["required_date"];
            $total = Cart::total();
            $order->total = $total;
            $order->save();
            $contentCart = Cart::content();
            foreach($contentCart as $item){
                $order_detail = new OrderDetail;
                $order_detail->order_id = $order->id;
                $order_detail->product_id = $item->id;
                $order_detail->price_each = $item->price;
                $order_detail->quantity = $item->qty;
                $order_detail->size = $item['options']->size;
                $order_detail->save();
            }
        }
        $detail = DB::table('order_details')
                        ->where('order_id', $order->id)
                        ->join('products', 'order_details.product_id', '=', 'products.id')
                        ->select('order_details.quantity', 'order_details.price_each', 'order_details.size', 'order_details.order_id', 'products.name', 'products.image')->get();
        Mail::send('email.order', ['order' => $order, 'detail' => $detail], function ($message) use ($order){
                $message->from('active.mail.sender@gmail.com', 'HPShop');
                $message->to($order->email)
                ->subject('HPShop');
            });
        Cart::destroy();
        return redirect('checkout')->with('contentCart', $contentCart)->with('total', $total)->with('successMessage', 'Đặt hàng thành công!');    
    }

    public function setStatus($id, $status){
        $order = Order::findOrFail($id);
        if($status == 1)
            $order->status = 0;
        else
            $order->status = 1;
        $order->save();
        return redirect('admin/orders/list');
    }

    public function getDetail($id){
        $order_detail = DB::table('order_details')
                        ->where('order_id', $id)
                        ->join('products', 'order_details.product_id', '=', 'products.id')
                        ->select('order_details.quantity', 'order_details.price_each', 'order_details.size', 'order_details.order_id', 'products.name', 'products.image')->get();
        return view('admin.orders.detail', compact('order_detail'));
    }
}
