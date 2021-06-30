<?php

namespace App\Mail;

use App\Exports\ReportMonth;
use App\Exports\StatisticExport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;

class ReportMonthMailNotify extends Mailable
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
        Excel::store(new ReportMonth,'public/report-month-'.$date.'.xlsx');
        $path = storage_path('app\public\report-month-'.$date.'.xlsx');
        return $this->view('admin.table.report_mail_notify',['date'=> $date])
        ->subject(__('lang.report-month, :date', ['date' => $date]))
        ->attach($path);
    }
}
