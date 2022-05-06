<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ public_path('css/index.css') }}" rel="stylesheet">
    <title>รายงานขนส่งรายวัน</title>
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
        h2{
            text-align: center;
        }
        #emp{
            border-collapse:collapse ;
           width: 100%;
        }
        #emp td{
            text-align: center;
        }
        #emp td,#emp th{
           border: 1px solid ;
           padding: 8px;
        }
        #emp th{
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
        }
        .ddd{
            width:150px;
            margin-left: 37%;
        }
        .text-sm{
            font-size:20px;
        }
        table,
        thead,
        tbody,
        tr,
        th,
        td {
            border: 1px solid rgb(0, 0, 0);
        }

    </style>

</head>
<body>
    @inject('thaiDateHelper', 'App\Services\ThaiDateHelperService')
    <div>
        <div class="ddd">
            <img src="{{ storage_path('app/public/img/1.jpg') }}" alt="">
        </div>
        <div class="text-3xl">
            @foreach( $orders->where('province_id',$province) as $row)
            @endforeach
            @php
            $p= 0;
            @endphp
            @foreach( $orders->where('province_id',$province) as $row)
                @if($p == 0)
                    @if($row->province->user_id == null)
                        <h2 class="font-bold">รายงานขนส่ง {{$row->province->province}}</h2>
                        <h2 class="font-bold">ประจำวันที่ {{$thaiDateHelper->simpleDateFormat($row->created_at)}}</h2>
                    @else
                        <h2 class="font-bold">รายงานขนส่ง {{$row->province->province}}({{$row->province->user->name}})</h2>
                    @endif

                @endif
                @php
                    $p = $p+1;
                @endphp
            @endforeach
        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs p-3 ">
            <div class="w-full overflow-x-auto">
                <table id="emp" class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-center">
                            <th class=" text-sm" >ประเภท</th>
                            <th class="text-sm">รายการ</th>
                            <th class=" text-sm">จุดลง</th>
                            <th class=" text-sm">ชื่อ - เบอร์โทร</th>
                            <th class="  text-sm">จำนวน</th>
                        </tr>
                    </thead>
                    <tbody >
                        @php
                            $sum = 0;
                        @endphp
                        @foreach( $GroupOrder->where('province_id',$province)->sortby('type')->sortby('city_id') as $order)
                            @foreach( $orders->where('province_id',$province) as $row)
                                @php
                                    $quantitys = 0;
                                    $quantitys = $row->quantity + $quantitys;
                                @endphp
                            @endforeach
                                <tr>
                                    <td class="text-sm">{{$order->type}}</td>
                                    @if($order->list == null)
                                    <td> - </td>
                                    @else
                                    <td class="text-sm">{{$order->list}}</td>
                                    @endif
                                    <td class="text-sm">{{$order->city->city}}</td>
                                    <td class="text-sm">{{ $order->name }} ({{$order->phone}})</td>
                                    <td class="text-sm">{{$quantitys}}</td>
                                </tr>
                                @php
                                    $sum = $sum + $quantitys
                                @endphp
                       @endforeach
                       <tr>
                           <td class="text-sm" colspan="4">รวม</td>
                           <td class="text-sm">ทั้งหมด {{$sum}} รายการ</td>
                       </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
