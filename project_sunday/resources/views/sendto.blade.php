<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>รายการส่งต่อ</title>
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

        @page {
            size: A4;
            margin: 0;
        }

        table,
        thead,
        tbody,
        tr,
        th,
        td {
            border: 1px solid rgb(0, 0, 0);
        }

        .mt-10 {
            margin-top: 50px;
        }

        .pr-l {
            padding-right: 3px;
            padding-left: 3px;
        }

        .text-right {
            text-align: right;
        }

    </style>
</head>

<body>
    @inject('thaiDateHelper', 'App\Services\ThaiDateHelperService')
    <div class="text-center mt-10">
        <h1 class="text-4xl font-bold">รายการลงของพี่วัตร</h1>
    <p class="text-2xl font-bold">วันที่ {{$thaiDateHelper->simpleDateFormat($date)}}</p>

    </div>
   
    <div class=" w-full  p-3">
        <div class="w-full">
            <div class="mr-4  ">
                <table class="w-full p-4">
                    <thead class="mt-10">
                        <tr class="text-2xl border-4">
                            <th>รายการ</th>
                            <th>จังหวัด</th>
                            <th>ชื่อร้าน-เบอร์โทร</th>
                            <th>จำนวน</th>
                        </tr>
                    </thead>
                    <tbody class="w-full p-4 text-center border-4 text-2xl">
                        @foreach($GroupOrder->where('sendto','ส่งต่อ') as $row)
                                @php
                                    $quantitys = 0;
                                @endphp
                            @foreach( $orders->where('province_id',$row->province_id) as $row)
                                @php
                                    $quantitys = $row->quantity + $quantitys;
                                @endphp
                            @endforeach
                        <tr class="text-xl border-4">
                            @if($row->list != null)
                                <td>{{$row->list}}</td> 
                            @else
                                <td>{{$row->type}}</td>
                            @endif
                            <td>{{$row->province->province}}</td>
                            <td>{{$row->name}}({{$row->phone}})</td>
                            <td>{{$quantitys}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
