<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function store(RegisterRequest $request){
        $params = $request->only(['username','email']);
        $params['password'] = Hash::make($request->password);
        $params['block'] = 0;
        $insert = User::create($params);
        if(isset($insert)){
            return back()->with('success',__('lang.create-user-success'));
        }else{
            return back()->with('fail', __('lang.create-user-fail'));
        }
    }
}
