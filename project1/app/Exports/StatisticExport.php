<?php

namespace App\Exports;

use App\Models\Statistic;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StatisticExport implements FromCollection,WithHeadings
{
    public function headings(): array{
        return [
            __('lang.order'),
            __('lang.total-revenue'),
            __('lang.sales'),
            __('lang.user'),
           
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = Statistic::statisticMonth();
        $data = array([
            $data['orders'],
            $data['total'],
            $data['sales'],
            $data['users'],
        ]);
        $data = collect($data);
        return $data;
    }
}
