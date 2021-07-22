<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function postLogin(LoginRequest $request){
        $login = $request->only(['username','password']);
        $login['block'] = 0;
        if(Auth::attempt($login)){
            $user = User::where('username', $request->username)->first();
            $token = $user->createToken('token')->plainTextToken;
            return response()->json([
                'message' => __('lang.login-success'),
                'checkLogin' => true,
                'token' => $token,
            ]);
        }  
        return response()->json([
            'message' => __('lang.login-fail'),
            'checkLogin' => false,
            'token' => '',
        ]);
    }

    public function logout($id){
        $user = User::find($id);
        $user->tokens()->delete();
    }
}
