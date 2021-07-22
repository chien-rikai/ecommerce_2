<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function store(RegisterRequest $request){
        $params = $request->only(['username','email']);
        $params['password'] = Hash::make($request->password);
        $params['block'] = 0;
        $insert = User::create($params);
        if(isset($insert)){
            return response()->json([
                'message' => true,
                'status' => true,
            ]);
        }else{
            return response()->json([
                'message' => false,
                'status' => true,
            ]);
        }
    }
}
