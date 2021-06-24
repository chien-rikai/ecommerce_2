<?php

use Carbon\Carbon;

function getMonthsAgo(){
    $months =array();
    $months[]=date('m-Y');
    for ($i = 1; $i < 6; $i++) {
        $months[]= date('m-Y', strtotime('last day of ' . -$i . 'month'));
    }
    return $months;
}
function getDaysInMonth($month,$data){
    $time = Carbon::createFromFormat('!m-Y',$month);
    $dates=[];
    $dt=[];
    // Start date
    $date = $time->firstOfMonth()->format('Y-m-d');
    // End date
    $end_date = $time->endOfMonth()->format('Y-m-d');
    while (strtotime($date) <= strtotime($end_date)) {
        $dates[]=$date;
        if(isset($data['orders'][$date])){
            $dt[]=$data['orders'][$date];
        }
        else $dt[]=0;
        $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
    }
    return ['dates'=>$dates,'data'=>$dt]; 
}