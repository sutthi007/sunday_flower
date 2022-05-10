<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ public_path('css/index.css') }}" rel="stylesheet">
    <link rel="icon" type="/img/svg" href="{{ public_path('app/public/img/1.jpg') }}">
    <title>สรุปบิล-pdf</title>
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

        @page {
            size: A4;
            margin: 0;
        }

        .w-100px {
            width: 100px;
        }.w-200px {
            width: 150px;
        }

        .flex-container {
            display: flex;
            flex-wrap: nowrap;

        }

        .mt--20px {
            margin-top: -100px;
        }
        .w-1000px {
            width: 700px;
        }
        .test-r {
            margin-left: 10px;
        }

        .-mt-5 {
            margin-top: -50px;
        }
        table, th, td {
            border: 1px solid rgb(0, 0, 0);
        }
        .-mt-4{
            margin-top: -20px;
        }
        .mr-x{
            margin-right: 50px;
        }
        .w-300px{
            width: 350px;
        }
        .mt-tt{
            margin-top: 50px ;
        }
        .mt-icon{
            margin-top: 10px
        }
        .ml-15{
            margin-left:85px;
        }
        .mr-15{
            margin-right:50px;
        }
        .text-right{
            text-align: right;
        }
        .ml-14{
            margin-left:50px;
        }
        .pr-l{
            padding-right:3px;
            padding-left:3px;
        }

    </style>
    <title>สรุปบิล</title>
</head>

<body>
    <form name="frmMain" action="" method="post">
    <div class="w-full">
        <div class="w-20 m-auto mt-tt">
            <h1 class="text-4xl font-bold ">
                ใบเสร็จรับเงิน
            </h1>
            @inject('thaiDateHelper', 'App\Services\ThaiDateHelperService')
        </div>
        <img class="w-100px ml-10 mt-icon" src="{{ storage_path('app/public/img/1.jpg') }}" alt="">
    @php

        $date = ($thaiDateHelper->simpleDateFormatPT($customer->created_at)+25647435)+$customer->id
    @endphp
        <div class="float-right mr-x">
            <h1>เลขที่ : PT-{{$date}}</h1>
            <h1>วันที่ : {{ $thaiDateHelper->simpleDateFormatbill($customer->created_at) }}</h1>
        </div>
        <div class="flex-container">
            <div class="p-2 ml-10 font-bold">
                <p class="text-3xl">หจก เชียงใหม่ ซันเดย์ ฟลาวเวอร์</p>
                <p class="-mt-4">เลขที่ 268/25 ถนนทุ่งโฮเต็ล อำเภอเมืองเชียงใหม่</p>
                <p class="-mt-4">จังหวัด เชียงใหม่ 50000</p>
            </div>
            <div class="float-right mr-4 p-2 w-200px  text-center mt--20px">
                <h1 class="text-2xl font-bold">{{ $customer->name }}</h1>
                <h1 class="text-2xl font-bold -mt-4">({{ $customer->phone }})</h1>
                @php
                    $total = 0;
                    $cost = 0;
                @endphp
                @foreach ($customer->orders as $totals)
                    @php
                        $total = $totals->price * $totals->quantity;
                    @endphp
                    @php
                        $cost = $total + $cost;
                    @endphp
                @endforeach

            </div>
        </div>
        <div class=" w-full   -mt-3">
            <div class="w-full ">
                <table  class="w-1000px  m-auto" >
                    <thead>
                        <tr class="text-xl " tableframe="below"  >
                            <th class="w-2" width="50px">ลำดับ</th>
                            <th class="" width="300px">รายการ</th>
                            <th class="">ปลายทาง</th>
                            <th class="">หน่วย</th>
                            <th class="" width="100px">ราคาต่อหน่วย</th>
                            <th class="">จำนวนเงิน</th>
                        </tr>
                    </thead>
                    @php
                        $cost = 0;
                        $i = 1;
                        $total = 0;
                        $price_to = 0;
                    @endphp
                    @foreach ($customer->orders as $order)
                        @php
                            $total = $order->price * $order->quantity;
                            $price_to = $order->price_to * $order->quantity
                        @endphp
                        @php
                            $cost = ($price_to + $total) + $cost;

                            $price = number_format($order->price,2) ;
                            $prices = number_format($total,2) ;
                        @endphp
                        <tbody class="">
                            <tr class="">
                                <td class="text-center text-xl" >{{$i++}}</td>
                                @if ($order->list == null)
                                    <td class=" text-xl pr-l">{{ $order->type }}</td>
                                @else
                                    <td class=" text-xl pr-l">{{ $order->list }}</td>
                                @endif
                                @if($order->provinces_tos_id == null)
                                <td class=" text-xl pr-l"> {{$order->city->city}}</td>
                                @else
                                <td class=" text-xl pr-l"> {{$order->provinces_tos->provinces_to}}</td>
                                @endif
                                <td class=" text-xl text-center">{{ $order->quantity }}</td>

                                <td class=" text-xl text-right pr-l">{{$price}}</td>
                                <td class=" text-xl text-right pr-l">
                                    {{ $prices }}
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                            <tr class="text-center">
                                <td class=" text-xl" colspan="3"></td>

                                <td class=" text-xl font-bold " colspan="2">
                                จำนวนเงินทั้งสิน (บาท)
                                </td>

                                <td class=" text-xl text-right pr-l">
                                   {{number_format($cost,2)}}
                                </td>
                            </tr>

                </table>
            </div>
        </div>
        <div class= "w-full mt-10">
            <div class=" ">
            <p class="text-xl ml-14">ผู้รับเงิน <span>{{Auth::user()->name}}</span> </p>
            <p class="text-xl ml-15">(..............................................................)</p>
            </div>
            <div class="text-center mr-15 mt--20px">
                @php
                    $mytime = Carbon\Carbon::now();
                @endphp
            <p class="text-xl float-right">วันที่  {{$thaiDateHelper->simpleDateFormatbill($mytime)}}</p>
            </div>
        </div>
    </form>
        <script language="JavaScript">

            function addCommas(nStr)
            {
                nStr += '';
                x = nStr.split('.');
                x1 = x[0];
                x2 = x.length > 1 ? '.' + x[1] : '';
                var rgx = /(\d+)(\d{3})/;
                while (rgx.test(x1)) {
                    x1 = x1.replace(rgx, '$1' + ',' + '$2');
                }
                return x1 + x2;
            }

            function fncSum()
            {
                 if(isNaN(document.frmMain.txtNumberA.value) || document.frmMain.txtNumberA.value == "")
                 {
                    alert('(Number A)Please input Number only.');
                    document.frmMain.txtNumberA.focus();
                    return;
                 }

                 if(isNaN(document.frmMain.txtNumberB.value) || document.frmMain.txtNumberB.value == "")
                 {
                    alert('(Number B)Please input Number only.');
                    document.frmMain.txtNumberB.focus();
                    return;
                 }

                 var TotSum = (parseFloat(document.frmMain.txtNumberA.value) + parseFloat(document.frmMain.txtNumberB.value)).toFixed(2);
                 document.frmMain.txtNumberC.value  = addCommas(TotSum);
            }
        </script>
</body>

</html>
