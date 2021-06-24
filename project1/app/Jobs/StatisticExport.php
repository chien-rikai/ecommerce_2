<?php

namespace App\Jobs;

use App\Models\Statistic;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithCharts;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Chart\Chart;

class StatisticExport implements FromCollection,WithHeadings
{   
    protected $monthYear;
    public function __construct($monthYear)
    {
        $this->monthYear =$monthYear;
    }
    public function headings(): array{
        return [
            __('lang.order'),
            __('lang.sales'),
            __('lang.user'),
            __('lang.total-revenue'),
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = Statistic::fetch($this->monthYear);
        unset($data['orders']);
        $data = array([
            $data['order_count'],
            $data['sales'],
            $data['users'],
            $data['total'],
        ]);
        $data = collect($data);
        return $data;
    }

}
