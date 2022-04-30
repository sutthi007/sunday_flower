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
        .mt-10{
            margin-top: 50px;
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
                <table class="w-full p-4 ">
                    <thead class="mt-10">
                        <tr class="text-xl border-4 ">
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
                        @php
                            $i = 0;
                            $a = 0;
                            $p = 0;
                            $pt = 0;
                        @endphp
                        @foreach($account->sortBy('list')->sortBy('province_id') as $order)
                            @php
                                $quantity = 0;
                                $price = 0;
                                $sendto = 0;
                            @endphp
                            @foreach($accounts->where('list',$order->list)->where('province_id',$order->province_id) as $key)
                                    @php
                                        $quantity = $key->quantity +$quantity;
                                        $price = ($key->price * $key->quantity)  + $price;
                                        $sendto = $key->price_to + $sendto;
                                        $to = $key->sendto;
                                        $city = $key->city;
                                    @endphp
                            @endforeach
                            <tr class="text-xl border-4">
                                @inject('thaiDateHelper', 'App\Services\ThaiDateHelperService')
                                @if($i == 0)
                                <td class="">{{$thaiDateHelper->simpleDateFormat($key->created_at)}}</td>
                                @else
                                <td class=""></td>
                                @endif
                                <td class="">{{$order->list}}</td>
                                <td class="">{{$order->province->province}}</td>
                                <td class="">{{$quantity}}</td>
                                <td class="">{{$price}}</td>
                                @if($to != null)
                                <td class="">{{$city->city}}</td>
                                @else
                                <td></td>
                                @endif
                                <td class="">{{$sendto}}</td>
                            </tr>
                            @php
                                $a = $quantity + $a ;
                                $p = $price + $p;
                                $pt = $sendto + $pt;
                                $i = 1 + $i ;
                            @endphp
                        @endforeach
                        <tr class="text-xl border-4 font-bold">
                            <td class="px-4 py-3"></td>
                            <td class="px-4 py-3" colspan="2"> รวมยอด</td>
                            <td class="px-4 py-3">{{$a}} รายการ</td>
                            <td class="px-4 py-3">{{$p}} บาท</td>
                            <td class="px-4 py-3">ค่าฝากต่อ</td>
                            <td class="px-4 py-3">{{$pt}}</td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr class="text-xl border-4">
                            <th class="px-4 py-3">{{$thaiDateHelper->simpleDateFormat($key->created_at)}}</th>
                            <th class="px-4 py-3" colspan="2">รายการใช้จ่าย</th>
                            <th class="px-4 py-3"></th>
                            <th class="px-4 py-3"></th>
                            <th class="px-4 py-3"></th>
                            <th class="px-4 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                            $a = 0;
                        @endphp
                        @foreach ( $expenses as $row)
                            <tr class="text-xl" >
                                <td class="px-4 py-3"></td>
                                <td class="px-4 py-3"colspan="2">{{$row->list}}</td>
                                <td class="px-4 py-3">{{$row->price}}</td>
                                <td class="px-4 py-3"></td>
                                <td class="px-4 py-3"></td>
                                <td class="px-4 py-3"></td>
                            </tr>
                            @php
                                $a = $row->price + $a ;
                                $i = 1 + $i ;
                            @endphp
                         @endforeach
                            <tr class="text-xl border-4 font-bold">
                                <td class="px-4 py-3"></td>
                                <td class="px-4 py-3" colspan="2">ยอดรวมรายจ่ายทั้งสิ้น(บาท)</td>
                                <td class="px-4 py-3">{{$a}}</td>
                                <td class="px-4 py-3"></td>
                                <td class="px-4 py-3"></td>
                                <td class="px-4 py-3"></td>
                            </tr>
                            <tr class="text-xl border-4 font-bold">
                                <td class="px-4 py-3"></td>
                                <td class="px-4 py-3" colspan="2"></td>
                                <td class="px-4 py-3"></td>
                                <td class="px-4 py-3"></td>
                                <td class="px-4 py-3"></td>
                                <td class="px-4 py-3"></td>
                            </tr>
                            <tr class="text-xl border-4 font-bold">
                                <td class="px-4 py-3"></td>
                                <td class="px-4 py-3" colspan="2">ค่าฝากของ</td>
                                <td class="px-4 py-3">{{$p}}</td>
                                <td class="px-4 py-3"></td>
                                <td class="px-4 py-3"></td>
                                <td class="px-4 py-3"></td>
                            </tr>
                            <tr class="text-xl border-4 font-bold">
                                <td class="px-4 py-3"></td>
                                <td class="px-4 py-3" colspan="2">ค่าส่งต่อ</td>
                                <td class="px-4 py-3">{{$pt}}</td>
                                <td class="px-4 py-3"></td>
                                <td class="px-4 py-3"></td>
                                <td class="px-4 py-3"></td>
                            </tr>
                            <tr class="text-xl border-4 font-bold">
                                <td class="px-4 py-3"></td>
                                <td class="px-4 py-3" colspan="2">รวม</td>
                                <td class="px-4 py-3">{{$p + $pt}}</td>
                                <td class="px-4 py-3"></td>
                                <td class="px-4 py-3"></td>
                                <td class="px-4 py-3"></td>
                            </tr>
                            <tr class="text-xl border-4 font-bold">
                                <td class="px-4 py-3"></td>
                                <td class="px-4 py-3" colspan="2"></td>
                                <td class="px-4 py-3"></td>
                                <td class="px-4 py-3"></td>
                                <td class="px-4 py-3"></td>
                                <td class="px-4 py-3"></td>
                            </tr>
                            <tr class="text-xl border-4 font-bold">
                                <td class="px-4 py-3"></td>
                                <td class="px-4 py-3" colspan="2">รายรับทั้งหมด</td>
                                <td class="px-4 py-3">{{$p + $pt}}</td>
                                <td class="px-4 py-3"></td>
                                <td class="px-4 py-3"></td>
                                <td class="px-4 py-3"></td>
                            </tr>
                            <tr class="text-xl border-4 font-bold">
                                <td class="px-4 py-3"></td>
                                <td class="px-4 py-3" colspan="2">ยอดรวมรายจ่ายทั้งสิ้น(บาท) </td>
                                <td class="px-4 py-3">{{$a}}</td>
                                <td class="px-4 py-3"></td>
                                <td class="px-4 py-3"></td>
                                <td class="px-4 py-3"></td>
                            </tr>
                            <tr class="text-xl border-4 font-bold">
                                <td class="px-4 py-3"></td>
                                <td class="px-4 py-3" colspan="2">ยอดคงเหลือ </td>
                                <td class="px-4 py-3">{{($p + $pt)-$a}}</td>
                                <td class="px-4 py-3"></td>
                                <td class="px-4 py-3"></td>
                                <td class="px-4 py-3"></td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
