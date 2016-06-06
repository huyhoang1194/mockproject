<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Validator,Input,Auth,Mail,Cart;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            // 'recaptcha_response_field' => 'required|recaptcha',
        ]);
    }

    public function getRegister()
    {
        $contentCart = Cart::content();
        $total = Cart::total();
        return view('auth.register', compact('contentCart', 'total'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request){
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $users = new User;
        $users->name= $request->input('name');
        $users->password= bcrypt($request->input('password'));
        $users->email= $request->input('email');
          
        $strcode=str_random(20);
        $users->codeAuth=$strcode;
        $data = array(
            'name' => $request->input('name'),
            "code" =>$strcode
            );
        Mail::send('email.auth', $data, function ($message) use ($users){
            $message->from('active.mail.sender@gmail.com', 'Mail Active User');
            $message->to($users->email)
            ->subject('Active User');
        });
        
        $users->save();
       
        return redirect('auth/login')->with('successMessage', 'Đăng ký thành công, vui lòng vào email để kích hoạt tài khoản!');
    }

    public function confirm($code){
        if(!$code){
            throw new InvalidConfirmationCodeException;
        }
        $user = User::where('codeAuth', $code)->first();
        if (!$user){
            throw new InvalidConfirmationCodeException;
        }
        $user->key_active = 1;
        $user->save();
        return redirect('auth/login')->with('successMessage','Tài khoản kích hoạt thành công!');
    
    }

    public function getLogin()
    {
        if (view()->exists('auth.authenticate')) {
            return view('auth.authenticate');
        }
        $contentCart = Cart::content();
        $total = Cart::total();
        return view('auth.login', compact('contentCart', 'total'));
    }

    public function postLogin() {
    $validator = Validator::make(Input::all(),
        array(
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        )
    );

    if($validator->fails()) {
        return redirect('auth/login')
                    ->withErrors($validator);
    } else {
            $user = User::where('email',Input::get('email'))->first();
            if($user->key_active==0){
                return redirect('auth/login')->with('errorMessage', 'Tài khoản của bạn chưa được kích hoạt, vui lòng vào email để kích hoạt tài khoản!');
            }

            $auth = array(
                    'email' => Input::get('email'),
                    'password' => Input::get('password'),
                    'key_active'=>1
                    );

            if(Auth::attempt($auth)) {
                return redirect('home')->with('successMessage', 'Đăng nhập thành công');
            }
        }
    return redirect('auth/login')->with('errorMessage', 'Login Failed .Please Try again');
    }
}
