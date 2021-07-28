<?php

namespace App\Http\Controllers\Api\Web;

use App\Enums\OrderStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePassword;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function changePassword(ChangePassword $request,$id){
        if((Hash::check($request->old_password, Auth::user()->password))){
            $user = $this->find($id);
            $params['password']= Hash::make($request->password);
            $update = $user->update($params);
    
            if($update){
                return response()->json(['message' => __('lang.change-password-success')]);
            }else{
                return response()->json(['message' => __('lang.password-fail')]);
            }
        }else{
            return response()->json(['message' => __('lang.password-fail')]);
        }
    }

    public function getOrders($id){
        $orders = Order::where('user_id',$id)->orderBy('created_at','desc')->get();
        $orders = Order::setAtt($orders);
        return response()->json([
            'orders' => $orders,
        ]);
    }
}
