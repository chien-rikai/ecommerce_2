<?php

namespace App\Mail;

use App\Jobs\StatisticExport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;

class ReportMailNotify extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $date = date('m-Y');
        Excel::store(new StatisticExport($date),'public/statistic'.$date.'.xlsx');
        $path = storage_path('app\public\statistic'.$date.'.xlsx');
        return $this->view('admin.table.mail_report_notify',compact('date'))
        ->subject(__('lang.report').''.$date)
        ->attach($path);
    }
}
