<?php

namespace App\Http\Controllers\Api\Web;

use App\Enums\OrderStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Jobs\SendMail;
use App\Models\DetailOrder;
use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $params = $request->except(['_method']);

        $cart = $this->covertCartToProductDetail($params['cart']);
        $params['status_id'] = OrderStatusEnum::processing;
        unset($params['cart']);
        $order = Order::create($params);
        $result=$order->detailOrders()->saveMany($cart);
        if(!$result){
            $order->delete();
            return response()->json(['success'=>false,'error'=>__('lang.order-fail')]);
        }
        SendMail::dispatch($params)->delay(now()->addMinute(1));
        return response()->json(['success'=>true,'message'=>__('lang.order-success')]);
    }
    function covertCartToProductDetail($cart){
        $detailOrders = [];
        foreach($cart as $value){
            $detailOrders[] = new DetailOrder(
                [
                    'product_id'=>$value['id'],
                    'quantity'=>$value['quantity'],
                    'price_base'=>$value['price']*(1-$value['discount']/100)
                ]
            );
        }
        return $detailOrders;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
