<?php

namespace App\Exports;

use App\Enums\OrderStatusEnum;
use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportMonth implements FromCollection,WithHeadings
{
    public function headings(): array
    {
        return [
            __('lang.name'),
            __('lang.email'),
            __('lang.phone'),
            __('lang.address'),
            __('lang.total-price'),
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $orders = Order::where('status_id',OrderStatusEnum::completed)->whereYear('updated_at',date('Y'))
        ->whereMonth('updated_at',date('m'))->get();
        $i = 0;
        foreach($orders as $order){
            $data[$i] = array([
                $order->name,
                $order->email,
                $order->phone,
                $order->address,
                $order->total_cost,
            ]);
            $i++;
        }
        $data = collect($data);
        return $data;
    }
}
