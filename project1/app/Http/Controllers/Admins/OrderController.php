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
        $orders = Order::paginate(10);
        
        $status = $this->getStatus();

        return view('admin.layout.orders_table_layout',compact(['orders','status']));
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
        return view('admin.order_detail',compact(['order','status']));
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
        $status_id = OrderStatusEnum::values()[$request->status];
        
        $order->status_id=  $status_id;

        $update = $order->save();
        //check update action success
        if($update){
            if($request->ajax())
                return response()->json(['message'=>__('lang.update-status-success')]);
            return back()->with('success', __('lang.edit-success'));
        }else{
            if($request->ajax())
                return response()->json(['message'=>__('lang.update-status-fail')]);
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
            return response()->json(['message'=>__('lang.delete-success'),'hasRemove'=>true]);
        }else{
            return response()->json(['message'=>__('lang.delete-fail'),'hasRemove'=>false]);
        }
    }
    /**
     * Filter order by status.
     *
     * @param   $id
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request,$status){
        if($status=='all'){
            $orders = Order::where($request->field,'like','%'.$request->key.'%'
                        )->paginate(10);
        }
        else
        $orders = Order::where([['status_id','=',OrderStatusEnum::values()[$status]],
                               [$request->field,'like','%'.$request->key.'%']
                        ])->paginate(10);
        $status = $this->getStatus();
        if($request->ajax()){
            return response()->json(['view'=>view('admin.orders_view',compact(['orders','status']))->render()]);
        }
        return view('admin.layout.orders_table_layout',compact(['orders','status']));
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
