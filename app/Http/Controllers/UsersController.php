<?php

namespace App\Http\Controllers;
use DB,Validator,File;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

    public function getList(){
        $users = DB::table('users')->paginate(5);
        return view('admin.users.showListUser')->with("users", $users);
    }

    public function getAdd(){
        return view('admin.users.createNewUser');
    }

    public function postAdd(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            return redirect('admin/users/add')->withErrors($validator)->withInput();
        }
        $data_input = $request->all();        
        $users = new User;        
        $users->name = $data_input["name"];       
        $users->email = $data_input["email"];        
        $users->password = bcrypt($data_input["password"]);
        $users->role_id = $data_input["role_id"];
        $users->key_active = $data_input["key_active"];
        $users->codeAuth = str_random(20);
        $users->save();
        return redirect('admin/users/list')->with('successMessage', 'Tạo người dùng mới thành công!');
    }

    public function getEdit($id){
        $user = User::findOrFail($id);
        return view('admin.users.editUser')->with("user", $user);
    }

    public function postEdit($id, Request $request){
        $user = User::findOrFail($id);
        $data_input = $request->all();        
        $user->name = $data_input["name"];
        $user->email = $data_input["email"];
        $user->status = $data_input["status"];        
        $user->role_id = $data_input["role_id"];
        $user->key_active = $data_input["key_active"];        
        if($request->file('avatar')){
            File::delete(public_path().'/avatar/'.$user->avatar); 
            // xoa file anh cu trong thu muc public/avatar
            // namespace function convert_to_slug: app\MyFunction\functions.php
            $user->avatar = convert_to_slug($user->name).'_'.rand(0,9999).'.'. $request->file('avatar')->getClientOriginalExtension(); 
            //set $users->avatar la (ten user_rand(0,99999)+duoi anh)
            $request->file('avatar')->move(public_path().'/avatar/', $user->avatar);
            // luu anh da dc set ten vao thu muc public/avatar
        }
        $user->save();
        return redirect('admin/users/list');
    }

    public function setRole($id, $role_id){
        $user = User::findOrFail($id);
        if($role_id == 0)
            $user->role_id = 1;
        else
            $user->role_id = 0;
        $user->save();
        return redirect('admin/users/list');
    }

    public function setActive($id, $key_active){
        $user = User::findOrFail($id);
        if($key_active == 1)
            $user->key_active = 0;
        else
            $user->key_active = 1;
        $user->save();
        return redirect('admin/users/list');
    }

    public function del($id){
        $user = User::findOrFail($id);
        File::delete(public_path().'/avatar/'.$user->avatar);
        $user->delete();
        return redirect('admin/users/list')->with('successMessage', 'Xóa người dùng thành công!');
    }
}
