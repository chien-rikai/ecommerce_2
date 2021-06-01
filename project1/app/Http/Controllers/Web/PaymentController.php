<?php

namespace App\Http\Controllers\Web;

use App\Enums\OrderStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\DetailOrder;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Show checkout.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $user = Auth::user();
        return view('web.page.order_checkout',compact(['user']));
    }
    /**
     * Create new checkout information.
     * @param OrderRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request){
        $validated = $request->validated();
        $params = $request->except(['_token','_method']);

        $cart = CartController::findCart();
        if(blank($cart)){
            return back()->with('fail',__('lang.cart-empty'));
        }
        $params['status_id'] = OrderStatusEnum::processing;
        $order = Order::create($params);
        if(blank($order)){
            return back()->with('error',__('lang.order-fail'));
        }
        $cart = $this->covertCartToDetailOrder($cart);

        $result=$order->detailOrders()->saveMany($cart);

        if(!$result){
            return back()->with('error',__('lang.order-fail'));
        }
        $request->session()->forget('cart_'.$request->user_id);
        
        return back()->with('success',__('lang.order-success'));
    }
    /**
     * Update checkout info.
     * @param $request, $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id){

    }
    public function covertCartToDetailOrder($cart){
        $detailOrders = [];
        foreach($cart as $key=>$value){
            if($key=='total') continue;
            $detailOrders[] = new DetailOrder(
                [
                    'product_id'=>$key,
                    'quantity'=>$value['quantity'],
                    'price_base'=>$value['base_price']
                ]
            );
        }
        return $detailOrders;
    }
}
