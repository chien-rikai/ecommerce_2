<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function toArray() {
        $data = parent::toArray();
        $data['status'] = $this->status->status;

        return $data;
    }

    public static function setAtt($orders){
        foreach($orders as $order){
            $order->setAttribute('total_cost',$order->total_cost);
            $order->setAttribute('summary',$order->summary);
        }
        return $orders;
    }

}