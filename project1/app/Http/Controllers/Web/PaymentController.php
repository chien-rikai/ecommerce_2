<?php

namespace App\Http\Controllers\Web;

use App\Enums\OrderStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Jobs\SendMail;
use App\Models\DetailOrder;
use App\Models\Order;
use App\Models\User;
use App\Services\PayPalService;
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
        $temp = $cart;
        $cart = $this->covertCartToDetailOrder($cart);
        $params['status_id'] = OrderStatusEnum::processing;
        $result= Order::storeOrder($params,$cart);
        if(!$result['status']){
            return back()->with('error',$result['message']);
        }
        $sendMail = SendMail::dispatch($params)->delay(now()->addMinute(1));
        $request->session()->put('cart_'.$request->user_id,['total'=>0]);
        $request->session()->put('cart_temp_'.$request->user_id,$temp);
        return redirect()->route('payment.viewPayment');
    }
    /**
     * Update checkout info.
     * @param $request, $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id){

    }
    public function cancelPay(Request $request){
        if($request->session()->has('cart_temp_'.Auth::id())){
            $request->session()->forget('cart_temp_'.Auth::id());
        }
        return redirect()->route('payment.index');
    }
    public function indexPayment(Request $request){
        $temp= [];
        if($request->session()->has('cart_temp_'.Auth::id())){
            $temp= Session::get('cart_temp_'.Auth::id());
        }
        if(empty($temp)) return redirect()->route('payment.index');
        return view('web.page.order_success',['carts'=>$temp]);
        
    }
    public function pay(Request $request){
        if($request->session()->has('cart_temp_'.Auth::id())){
            $request->session()->forget('cart_temp_'.Auth::id());
        }
        if($request->ajax()){
            return response()->json(['success'=>true]);
        }
        return redirect()->route('home.index');
    }
    private function covertCartToDetailOrder($cart){
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
