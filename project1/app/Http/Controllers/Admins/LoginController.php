<?php

namespace App\Http\Controllers\Admins;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index(){
        if(Auth::check()){
            return redirect()->route('statistic.index');
        }
        return view('admin.login.index');
    }

    public function postLogin(LoginRequest $request){
        $login = $request->only(['username','password']);
        $login['block'] = 0;
        $login['role'] = UserRole::admin;
        if(Auth::attempt($login)){
            return redirect()->route('statistic.index');
        }         
        return back()->with('fail',__('lang.login-fail'));
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login.index');
    }
}
