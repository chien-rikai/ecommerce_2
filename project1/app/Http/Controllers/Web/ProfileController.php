<?php

namespace App\Http\Controllers\Web;

use App\Enums\OrderStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $status= OrderStatusEnum::values();
        $orders = Order::where('user_id',Auth::id())->get();
        return view('web.page.profile',compact(['status','orders']));
    }
    public function show($status){
        // $status_id = OrderStatusEnum::values()[$status];
        // if(blank($status_id)){
        //     return response()->json(['hasFilter'=>false,'message'=>__('lang.status-not-found')]);
        // }
        $orders = Order::where('user_id',Auth::id())->where('status_id',$status)->get();
        return response()->json(['orders'=>$orders],200);
    }
}
