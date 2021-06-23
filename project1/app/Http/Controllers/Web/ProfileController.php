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
        $orders = Order::where('user_id',Auth::id())->orderBy('created_at','desc')->get();
        return view('web.page.profile',compact(['status','orders']));
    }
    
}
