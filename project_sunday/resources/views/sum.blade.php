<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการฝากของบริษัท</title>
</head>
<body>
    <div class="">
        <h2>ใบรายการฝากของบริษัท</h2>
    </div>
    <table>
        <thead>
            <tr>
                <th>วันเดือนปี</th>
                <th>รายการ</th>
                <th>จังหวัด</th>
                <th>จำนวน</th>
                <th>ราคา</th>
                <th>ส่งต่อ</th>
                <th>ราคา</th>
</tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            @php
                $i = 0;
                $a = 0;
                $p = 0;
                $pt = 0;
            @endphp
            <tr>
                @inject('thaiDateHelper', 'App\Services\ThaiDateHelperService')
                @if($order->id == 1)
                <td>{{$thaiDateHelper->simpleDateFormat($order->created_at)}}</td>
                @else
                <td></td>
                @endif
                <td>{{$order->list}}</td>
                <td>{{$order->province->province}}</td>
                <td>{{$order->quantity}}</td>
                @php
                    $i = $order->quantity * $order->price
                @endphp
                <td>{{$i}}</tr>
                <td>{{$order->sendto}}</td>
                <td>{{$order->price_to}}</td>
            </tr>
            @php
                $a = $order->quantity + $a ;
                $p = $i + $p;
                $pt = $order->price_to + $pt;
            @endphp
            @endforeach
            <tr>
                <td></td>
                <td colspan="2"> รวมยอด</td>
                <td>{{$a}}</td>
                <td>{{$p}}</td>
                <td>ค่าฝากต่อ</td>
                <td>{{$pt}}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>