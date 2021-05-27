<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        Session::put('url-back-login',url()->previous());
        if(Auth::check()){
            return redirect()->route('home.index');
        }
        return view('web.form.login');
    }

    public function postLogin(LoginRequest $request){
        $login = $request->only(['username','password']);
        $login['block'] = 0;
        if(Auth::attempt($login)){
            return redirect(Session::get('url-back-login'));
        }  
        
        return back()->with('fail',__('lang.login-fail'));
    }

    public function logout(){
        Auth::logout();
        return back();
    }
}
