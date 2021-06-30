<?php

namespace App\Models;

use App\Enums\OrderStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    public static function statisticAll(){
        $data['orders'] = Order::count();
        $data['users'] = User::count();
        $data['countSale'] = Order::where('status_id', '=', OrderStatusEnum::completed)->count();  
        $data['total'] = 0;    
        $orders = Order::where('status_id','=',OrderStatusEnum::completed)->get();
            foreach($orders as $order){
                $data['total'] += $order->total_cost;
            }
        return $data;
    }
}
