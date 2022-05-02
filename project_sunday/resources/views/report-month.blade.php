<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ public_path('css/index.css') }}" rel="stylesheet">
    <title>Document</title>
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
    <div class="w-full">
        <div class="text-center mt-10">
            <h2 class="text-4xl font-bold">ใบรายการฝากของบริษัท</h2>
    </div>
    <div class=" w-full  p-3">
        <div class="w-full">
            <div class="mr-4  " >
                <table class="w-full p-4 ">
                    <thead class="mt-10">
                        <tr class="text-xl border-4 ">
                            <th class="">วันเดือนปี</th>
                            <th class="">จังหวัด</th>
                            <th class="">ออเดอร์ทั้งหมด</th>
                            <th class="">รายการทั้งหมด</th>
                           
                        </tr>
                    </thead>
                    @inject('thaiDateHelper', 'App\Services\ThaiDateHelperService')
                    <tbody class="w-full p-4 text-center border-4 text-2xl">
                        @php
                            $total_order = 0;
                            $total_list = 0;
                            $all_order = 0;
                            $all_list = 0;
                            $i = 0;
                        @endphp
                            @foreach($report as $province)
                                @foreach($reports->where('province_id',$province->province_id) as $data)
                                    @php
                                        $total_order = $data->count();
                                        $total_list = $data->quantity +$total_list ;
                                    @endphp
                                @endforeach
                            <tr class="text-xl border-4"> 
                                @if($i == 0)
                                <td class="">{{$thaiDateHelper->simpleDateFormatMonth($data->created_at)}}</td>
                                @else
                                <td class=""></td>
                                @endif
                                <td class="">{{$province->province->province}}</td>
                                <td class="">{{$total_order}}</td>
                                <td class="">{{$total_list}}</td>
                            </tr>
                            @php
                                $all_order = $total_order + $all_order;
                                $all_list = $total_list + $all_list;
                                $i = $i+1;
                            @endphp
                            @endforeach
                            <tr class="text-xl border-4">
                                
                                <td class="font-bold " colspan="2">ยอดรวมทั้งหมด</td>
                                <td class="">ทั้งหมด {{$all_order}} ออเดอร์</td>
                                <td class="">ทั้งหมด {{$all_list}} รายการ</td>
                            </tr>
                           
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>