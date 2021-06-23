<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function index(){
        Session::put('url-back-login',url()->previous());
        if(Auth::check()){
            return redirect()->route('home.index');
        }
        return view('web.login.index');
    }

    public function postLogin(LoginRequest $request){
        $login = $request->only(['username','password']);
        $login['block'] = 0;
        if(Auth::attempt($login)){
            return redirect(Session::get('url-back-login'));
        }  
        
        return back()->with('fail',__('lang.login-fail'));
    }

    public function redirectToFacebook($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {  
        $user = Socialite::driver($provider)->user();

        $this->_registerOrLoginUserFacebook($user);

        return redirect()->route('home.index');
    }



    protected function _registerOrLoginUserFacebook($data){
        $user = User::where('id', '=', $data->id)->first();
        if (!$user) {
            $params = [
                'id' => $data->id, 
                'first_name' => $data->name, 
                'email' => $data->email,
            ];
            $user = User::create($params);
        }
        Auth::login($user);
    }

    public function logout(){
        Auth::logout();
        return back();
    }
}
