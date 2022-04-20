<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลขนส่ง</title>
</head>
<body>
    <div>
        <h2>สรุปรายงานขนส่ง</h2>
    </div>
    <div  class="w-full overflow-hidden rounded-lg shadow-xs p-3">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr 
                        class="text-xs font-semibold tracking-wide  text-center text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">จังหวัด</th>
                        <th class="px-4 py-3">ประเภท</th>
                        <th class="px-4 py-3">รายการ</th>
                        <th class="px-4 py-3">ชื่อ - เบอร์โทร</th>
                        <th class="px-d py-3">จำนวน</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        
                    <tr>
                        <td>{{$order->province}}</td>
                    </tr>
                        @php
                            $i = 0
                        @endphp
                        @foreach($types->where('province',$order->province) as $type)
                            <tr>
                                <td></td>
                                <td>{{$type->type}}</td>
                                <td>{{$type->list}}</td>
                                <td>{{$type->name}}{{'('.$type->phone .')'}}</td>
                                <td>{{$type->quantity}}</td>  
                            </tr>
                            @php
                                $i = $type->quantity + $i
                            @endphp
                            
                        @endforeach
                        <td> ทั้งหมด {{$i}} </td>
                    @endforeach 

                </tbody>
            </table>
        </div>
    </div>
</body>
</html>