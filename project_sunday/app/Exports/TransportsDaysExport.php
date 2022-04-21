<?php

namespace App\Exports;

use App\Models\Order;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class TransportsDaysExport implements FromView
{

    public function view(): View
    {
        return view('table',[
            'orders'=> Order::select('province')
                            ->groupBy('province')
                            ->get(),
            'types' => Order::all()
        ]);
    }
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function headings():array{
    //     return [
    //         ''
    //     ];
    // }

    // public function collection()
    // {

    //     return Order::all();
    // }
}
