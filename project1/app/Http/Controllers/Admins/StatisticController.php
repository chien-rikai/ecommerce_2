<?php

namespace App\Http\Controllers\Admins;

use App\Enums\OrderStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Statistic;
use App\Models\User;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index(){
        $orders= Order::countOrders();
        $data = Statistic::statisticAll();
        return view('admin.statistic',compact(['orders', 'data']));
    }
}
