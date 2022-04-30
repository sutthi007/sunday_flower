<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ข้อมูลขนส่ง</title>
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

    </style>

</head>
<body>
    <div>
        <div class="ddd">
            <img src="{{ storage_path('app/public/img/1.jpg') }}" alt="">
        </div>
        <div class="text-3xl">
        @php
         $p= 0; 
        @endphp
        @foreach( $orders->where('province_id',$province) as $row)
            @if($p == 0)
                <h2>รายงานขนส่ง {{$row->province->province}}</h2>
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
                        <tr>
                            <th class="px-4 py-3">ประเภท</th>
                            <th class="px-4 py-3">รายการ</th>
                            <th class="px-4 py-3">จุดลง</th>
                            <th class="px-4 py-3">ชื่อ - เบอร์โทร</th>
                            <th class="px-d py-3">จำนวน</th>
                        </tr>
                    </thead>
                    <tbody >
                        @php
                            $sum = 0;
                        @endphp
                        @foreach( $orders->where('province_id',$province)->sortby('type')->sortby('city_id') as $order)
                            <tr>
                                <td>{{$order->type}}</td>
                                @if($order->list == null)
                                 <td> - </td>
                                @else
                                 <td>{{$order->list}}</td>
                                @endif
                                <td>{{$order->city->city}}</td>
                                <td>{{ $order->name }} ({{$order->phone}})</td>
                                <td>{{$order->quantity}}</td>
                            </tr>
                            @php
                                $sum = $sum + $order->quantity
                            @endphp
                       @endforeach
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @foreach($row as $key)
        {{$key->name}} 
    @endforeach
    
</body>
</html>
