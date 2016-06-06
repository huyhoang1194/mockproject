<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart,Validator,Auth;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function getMyAccount(){
        $contentCart = Cart::content();
        $total = Cart::total();
        return view('pages.my-account', compact('contentCart', 'total'));
    }

    public function postMyAccount(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'email',
            'phone' => 'numeric'
        ]);
        if ($validator->fails()) {
            return redirect('checkout')->withErrors($validator)->withInput();
        }  
        $user = User::findOrFail(Auth::user()->id);

        $data_input = $request->all();  
        $user->name = $data_input["name"];             
        $user->email = $data_input["email"];
        $user->phone = $data_input["phone"];
        $user->fax = $data_input["fax"];
        $user->post_code = $data_input["post_code"];
        $user->address = $data_input["address"];
        $user->save();
        $contentCart = Cart::content();
        $total = Cart::total();
        return redirect('my-account')->with('contentCart', $contentCart)->with('total', $total)->with('successMessage', 'Cập nhật thông tin tài khoản thành công!');
    }
}
