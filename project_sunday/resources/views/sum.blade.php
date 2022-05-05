<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ public_path('css/index.css') }}" rel="stylesheet">
    <title>รายการฝากของบริษัท รายวัน</title>
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
        .pr-l{
            padding-right:3px;
            padding-left:3px;
        }
        .text-right{
            text-align: right;
        }
    </style>
</head>
<body>
    @inject('thaiDateHelper', 'App\Services\ThaiDateHelperService')
    <div class="w-full">
        <div class="text-center mt-10">
            <h2 class="text-4xl font-bold">ใบรายการฝากของบริษัท</h2>
            @foreach($account->sortBy('list')->sortBy('province_id') as $order)
                @foreach($accounts->where('list',$order->list)->where('province_id',$order->province_id) as $key)
                @endforeach
                <h3 class="text-2xl font-bold">ประจำวันที่ {{$thaiDateHelper->simpleDateFormat($key->created_at)}}</h3>
            @endforeach


    </div>
    <div class=" w-full  p-3">
        <div class="w-full">
            <div class="mr-4  " >
                <p class="text-center text-2xl font-bold" >รายรับ</p>
                <table class="w-full p-4 ">
                    <thead class="mt-10">
                        <tr class="text-2xl border-4 ">
                            <th class="">รายการ</th>
                            <th class="">จังหวัด</th>
                            <th class="">จำนวน(หน่วย)</th>
                            <th class="">จำนวนเงิน(บาท)</th>
                            <th class="">ส่งต่อ</th>
                            <th class="">จำนวนเงิน(บาท)</th>
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
                                        $prices = number_format($price,2);
                                        $sendtos = number_format($sendto,2);
                                    @endphp
                            @endforeach
                            <tr class="text-xl border-4">

                                @if($order->list != null)
                                    <td class="">{{$order->list}}</td>
                                @else
                                    <td class="">{{$order->type}}</td>
                                @endif

                                <td class="">{{$order->province->province}}</td>
                                <td class="">{{$quantity}}</td>
                                <td class="text-right pr-l">{{$prices}}</td>
                                @if($to != null)
                                <td class="">{{$city->city}}</td>
                                @else
                                <td></td>
                                @endif
                                <td class="text-right pr-l">{{$sendtos}}</td>
                            </tr>
                            @php
                                $a = $quantity + $a ;
                                $p = $price + $p;
                                $pt = $sendto + $pt;
                                $i = 1 + $i ;
                                $ps = number_format($p,2);
                                $pts = number_format($pt,2);
                            @endphp
                        @endforeach
                        <tr class="text-xl border-4 font-bold">
                            <td class="" colspan="2"> รวม</td>
                            <td class="">{{$a}}</td>
                            <td class="text-right pr-l">{{$ps}}</td>
                            <td class="">ค่าฝากต่อ</td>
                            <td class="text-right pr-l">{{$pts}}</td>
                        </tr>
                        <tr class="text-xl border-4 font-bold">
                            <td class="" colspan="5">รวมรายได้ทั้งสิ้น</td>
                            <td class="">{{number_format($ps+$pts)}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="w-full  p-3">
        <div class="w-full">
            <div class="mr-4 ">
                <p class="text-center text-2xl font-bold" >รายจ่าย</p>
                <table class="w-full p-4 ">
                    <thead>
                        <tr class="text-xl border-4">
                            <th class="" colspan="2">รายการใช้จ่าย</th>
                            <th class="">จำนวนเงิน(บาท)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                            $a = 0;
                        @endphp
                        @foreach ( $expenses as $row)
                            <tr class="text-xl" >
                                <td class=""colspan="2">{{$row->list}}</td>
                                <td class="text-right">{{number_format($row->price,2)}}</td>
                            </tr>
                            @php
                                $a = $row->price + $a ;
                                $i = 1 + $i ;
                                $as = number_format($a,2);
                                $ps = number_format($p,2);
                                $pts = number_format($pt,2);
                                $ps = number_format($p,2);
                                $edit = 0;
                            @endphp
                         @endforeach

                            <tr class="text-xl border-4 font-bold">
                                <td class="pr-l" colspan="2">ยอดรวมรายจ่ายทั้งสิ้น</td>
                                <td class="text-right pr-l">{{number_format($a,2)}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="text-center text-2xl font-bold" >ยอดคงเหลือ</p>
                    <table class="w-full p-4 ">
                        <thead>
                            <tr class="text-xl border-4">
                                <th class="" colspan="2">รายการ</th>
                                <th class="">จำนวนเงิน(บาท)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-xl border-4 font-bold">
                                @php
                                    $edit = $p + $pt;
                                @endphp
                                <td class="pr-l" colspan="2">รายรับทั้งหมด</td>
                                <td class="text-right pr-l">{{number_format($edit,2)}}</td>
                            </tr>
                            <tr class="text-xl border-4 font-bold">
                                <td class="pr-l" colspan="2">ยอดรวมรายจ่ายทั้งสิ้น </td>
                                <td class="text-right pr-l">{{number_format((float)$a,2)}}</td>
                            </tr>
                            <tr class="text-xl border-4 font-bold">
                                <td class="pr-l" colspan="2">ยอดคงเหลือสุทธิ </td>
                                <td class="text-right pr-l">{{number_format(((float)$edit)-$a,2)}}</td>
                            </tr>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</body>
</html>
