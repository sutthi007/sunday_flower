<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;

class TransportsDaysExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return [
            ''
        ];
    }

    public function collection()
    {

        return Order::all();
    }
}
