<?php

namespace App\Exports;

use App\Models\Order;
use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class TransportsDaysExport implements FromQuery
{
     use Exportable;

    public function query()
    {
        return user::query()
        ->where('role','admin');
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
