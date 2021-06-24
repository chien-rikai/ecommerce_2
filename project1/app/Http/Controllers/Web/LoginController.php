<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
    public function redirectToSocial($social)
    {
        return Socialite::driver($social)->redirect();
    }  
    public function handleCallback($social)
    {
        $user = Socialite::driver($social)->user();
        $authUser = User::findOrCreateUser($user);
        Auth::login($authUser, true);
        return redirect()->route('home.index');
    }
    public function logout(){
        Auth::logout();
        return back();
    }
}
