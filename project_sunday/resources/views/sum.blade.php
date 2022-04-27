<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ public_path('css/index.css') }}" rel="stylesheet">
    <title>รายการฝากของบริษัท</title>
    <style>
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }

        body {
            font-family: "THSarabunNew";
        }
        @page{
            size: A4;
            margin: 0;
        }
        table,thead,tbody,tr, th, td {
     border: 1px solid rgb(0, 0, 0);
        }
    </style>
</head>
<body>
    
    <div class="w-full">
        <div class="text-center">
            <h2 class="text-4xl font-bold">ใบรายการฝากของบริษัท</h2>
    </div>
    <div class=" w-full  p-3">
        <div class="w-full">
    <div class="mr-4  " >
    <table class="w-full p-4  ">
        <thead>
            <tr class="text-xl border-4">
                <th class="px-4 py-3">วันเดือนปี</th>
                <th class="px-4 py-3">รายการ</th>
                <th class="px-4 py-3">จังหวัด</th>
                <th class="px-4 py-3">จำนวน</th>
                <th class="px-4 py-3">ราคา</th>
                <th class="px-4 py-3">ส่งต่อ</th>
                <th class="px-4 py-3">ราคา</th>
            </tr>
        </thead>
        <tbody class="w-full p-4 text-center border-4 text-2xl">
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
                <td class="">{{$thaiDateHelper->simpleDateFormat($order->created_at)}}</td>
                @else
                <td class=""></td>
                @endif
                <td class="">{{$order->list}}</td>
                <td class="">{{$order->province->province}}</td>
                <td class="">{{$order->quantity}}</td>
                @php
                    $i = $order->quantity * $order->price
                @endphp
                <td class="">{{$i}}</td>
                <td class="">{{$order->sendto}}</td>
                <td class="">{{$order->price_to}}</td>
            </tr>
            @php
                $a = $order->quantity + $a ;
                $p = $i + $p;
                $pt = $order->price_to + $pt;
            @endphp
            @endforeach
            <tr>
                <td class=""></td>
                <td colspan="2"> รวมยอด</td>
                <td class="">{{$a}}</td>
                <td class="">{{$p}}</td>
                <td class="">ค่าฝากต่อ</td>
                <td class="">{{$pt}}</td>
            </tr>
        </tbody>
    </table>
</div>
        </div>
    </div>

</body>
</html>