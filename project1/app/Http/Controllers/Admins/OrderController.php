<?php

namespace App\Http\Controllers\Admins;

use App\Enums\OrderStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\StatusOrder;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class OrderController extends Controller
{
    /**
     * Get all orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //Pagination
        $orders = Order::paginate(20);
        
        $status = $this->getStatus();

        return view('admin\orders_view',compact(['orders','status']));
    }
    /**
     * Get order by id.
     *
     * @param   $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $order = $this->find($id);
        $status = $this->getStatus();
        return view('admin\order_detail',compact(['order','status']));
    }
    /**
     * Update status for an order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id){
        $order = $this->find($id);
        
        //parse status enum to value in db
        $status = OrderStatusEnum::tryFrom($request->status);
        
        $order->status_id=  $status->value;

        $update = $order->save();
        //check update action success
        if($update){
            return back()->with('success', __('lang.edit-success'));
        }else{
            return back()->with('fail', __('lang.edit-fail'));
        }
    }
    /**
     * Delete order.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //call func find to find order by id
        $order = $this->find($id);
        //delete order
        $delete = $order->delete();
        //check delete action success
        if($delete){
            return back()->with('success', __('lang.delete-success'));
        }else{
            return back()->with('fail', __('lang.delete-fail'));
        }
    }
    /**
     * Filter order by status.
     *
     * @param   $id
     * @return \Illuminate\Http\Response
     */
    public function filter($status){

        $orders = Order::where('status_id',$status)->paginate(10);
        
        $status = $this->getStatus();

        return view('admin\orders_view',compact(['orders','status']));
    }
    /**
     * Function find order by id
     * @param  int $id
     * @return \App\Models\Order or null
     */
    public function find($id){
    
        $order= Order::find($id);

        if(blank($order)){
            return back()->with('fail', __('lang.order-not-found'));
        }
        return $order;
    }
    /**
     * Function get all status order
     * @return \App\Models\StatusOrder or null
     */
    public function getStatus(){
    
        return OrderStatusEnum::values();
    }
    

}
