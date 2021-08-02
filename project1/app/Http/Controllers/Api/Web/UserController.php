<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        return Auth::user();
    }

    public function find($id){
        $user = User::find($id);
        if(blank($user)){
            return response()->json([
                'message' => __('lang.update-profile-success')
            ]);
        }
        return $user;
    
    }

    public function update(ProfileUpdateRequest $request, $id){

       $params = $request->only(['first_name','last_name','email','phone','address','birthday','gender']);
        $user = $this->find($id);

        $update = $user->update($params);
        if($update){
            return response()->json([
                'message' => __('lang.update-profile-success')
            ]);
        }else{
            return response()->json([
                'message' => __('lang.update-profile-success')
            ]);
        }    
    }
}
