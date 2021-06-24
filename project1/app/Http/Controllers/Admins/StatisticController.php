<?php

namespace App\Http\Controllers\Admins;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Jobs\SendReport;
use App\Jobs\StatisticExport;
use App\Models\Order;
use App\Models\Statistic;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StatisticController extends Controller
{
    public function index(){
        $data = Statistic::fetch(date('m-Y'));
        $month = date('m-Y');
        return view('admin.statistic',compact(['data','month']));
    }
    public function export($monthYear){
        return Excel::download(new StatisticExport($monthYear),'statistic'.$monthYear.'.xlsx');
    }
    public function show($monthYear){
        $data = Statistic::fetch($monthYear);
        return view('admin.statistic',['data'=>$data,'month'=>$monthYear]);
    }
}
