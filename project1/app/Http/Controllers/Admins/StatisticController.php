<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index(){
        $orders= Order::countOrders();
        return view('admin.statistic',compact(['orders']));
    }
}
