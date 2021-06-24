<?php
namespace App\Models;
use App\Models\Order;
use App\Models\User;

class Statistic{
    public static function fetch($monthYear){
        $time= explode('-',$monthYear);
        $data = Order::calcTotal($time[0],$time[1]);
        $orders= Order::countOrders($time[0],$time[1]);
        $data['order_count'] = $orders->sum(function($order){
            return $order;
        });
        $data['orders'] = $orders;
        $data['users'] = User::countUsers();
        return $data;
    }
}