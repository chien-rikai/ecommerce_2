<?php

namespace App\Http\Controllers\Admins;


use App\Exports\StatisticExport;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Statistic;
use Maatwebsite\Excel\Facades\Excel;

class StatisticController extends Controller
{
    public function index(){
        $orders= Order::countOrders();
        $data = Statistic::statisticAll();
        return view('admin.statistic',compact(['orders', 'data']));
    }

    public function export() 
    {
        return Excel::download(new StatisticExport, 'statistic-'.date('d-m-Y').'.xlsx');
    }

}
