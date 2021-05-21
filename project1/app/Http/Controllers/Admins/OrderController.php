<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Get all orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $orders = Order::all();
        return view('admin\orders_view',compact(['orders']));
    }
    /**
     * Get order by id.
     *
     * @param   $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){

    }
    /**
     * Update status for an order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id){

    }
    /**
     * Delete order.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

    }
}
