<?php

namespace App\Models;

use App\Enums\OrderStatusEnum;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['name','phone','email','address','status_id','user_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function detailOrders(){
        return $this->hasMany(DetailOrder::class);
    }
    public function status(){
        return $this->hasOne(StatusOrder::class,'id','status_id');
    }
    public function getTotalCostAttribute(){
        return $this->detailOrders->sum('price');
    }
    public function getSummaryAttribute(){
        $details=$this->detailOrders;
        $result='';
        foreach($details as $detail){
            $result= $result.' '.$detail->product->name.' x'.$detail->quantity.',';
        }
        return $result;
    }
    public static function calcTotal($month,$year){
        $result=['total'=>0,'sales'=>0];        
        $sales = Order::where('status_id',OrderStatusEnum::completed)
                            ->whereYear('created_at',$year)
                            ->whereMonth('created_at',$month)
                            ->get();
        foreach($sales as $order){
            $result['total'] += $order->total_cost;
            $result['sales']++;
        }
        return $result;
    }
    public static function countOrders($month,$year){
        $orders = Order::select(DB::raw('count(*) as count'),DB::raw('Date(created_at) as date'))
                            ->whereYear('created_at',$year)
                            ->whereMonth('created_at',$month)
                            ->groupBy('date')
                            ->pluck('count','date');                    
        return $orders;                    
    }
    public static function storeOrder($params,$cart){
        try{
            DB::beginTransaction();
            $order = Order::create($params);
            if(!$order){
                throw new Exception(__('lang.order-fail'));
            }
            $details=$order->detailOrders()->saveMany($cart);
            if(!$details){
                throw new Exception(__('lang.order-fail'));
            }
            foreach($details as $detail){
                $product=Product::find($detail->product_id);
                if($product->quantity<$detail->quantity){
                    throw new Exception(__('lang.has-product-out-stock'));
                }
                $product->update(['quantity'=>$product->quantity-$detail->quantity,
                                      'sold'=>$detail->quantity]);
            }
            DB::commit();
        }catch(Exception $e){
            DB::rollBack();
            return ['status'=>false,'message'=>$e->getMessage()];
        }
        return ['status'=>true,'message'=>__('lang.order-success')];;
    }

}