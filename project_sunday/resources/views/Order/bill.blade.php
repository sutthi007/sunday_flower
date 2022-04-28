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

        .w-200px {
            width: 150px;
        }

        .flex-container {
            display: flex;
            flex-wrap: nowrap;

        }

        .mt--20px {
            margin-top: -150px;
        }

        .test {
            margin-left: 26;
        }
        .test-r {
            margin-left: 55px;
        }

    </style>
    <title>สรุปบิล</title>
</head>

<body>
    <div class="w-full">
        <div class="w-20 m-auto ">
            <h1 class="text-4xl font-bold">
                สรุปบิล
            </h1>
        </div>
        <img class="w-200px ml-10" src="{{ storage_path('app/public/img/1.jpg') }}" alt="">

        <div class="flex-container">
            <div class="p-2 ml-10 font-bold">
                <p class="text-3xl">บริษัท หจก ซันเดย์ ฟลาวเวอร์</p>
                <p>เลขที่ 268/27 ถนนทุ่งโฮเต็ล อำเภอเมืองเชียงใหม่</p>
                <p>จังหวัด เชียงใหม่ 50000</p>
            </div>
            <div class="float-right mr-4 p-2 w-200px  text-center mt--20px">
                <h1 class="text-2xl font-bold">{{ $customer->name }}</h1>
                <p class="font-bold">ทั้งหมด</p>
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
                <h1 class="text-2xl bg-pink text-white ">{{ $cost }} บาท</h1>
            </div>
        </div>
        <div class=" w-full  p-3">
            <div class="w-full">
                <table class="w-full p-4">
                    <thead>
                        <tr class="text-xl ">
                            <th class="px-4 py-3">ลำดับ</th>

                            <th class="px-4 py-3">รายการ</th>
                            <th class="px-4 py-3">จำนวน</th>
                            <th class="px-4 py-3">ชื่อผู้รับ</th>
                            <th class="px-4 py-3">เบอร์โทร</th>
                            <th class="px-4 py-3">ราคา</th>
                        </tr>
                    </thead>
                    @php
                        $cost = 0;
                        $i = 1;
                        $total = 0;
                    @endphp
                    @foreach ($customer->orders as $order)
                        @php
                            $total = $order->price * $order->quantity;
                        @endphp
                        @php
                            $cost = $total + $cost;
                        @endphp
                        <tbody class="">
                            <tr class="text-center">
                                <td class="px-4 py-3">1</td>
                                <td class="px-4 py-3 text-xl">{{ $order->list }}</td>
                                <td class="px-4 py-3 text-xl">{{ $order->quantity }}</td>
                                <td class="px-4 py-3 text-xl">{{ $order->name }}</td>
                                <td class="px-4 py-3 text-xl">{{ $order->phone }}</td>
                                <td class="px-4 py-3 text-xl">
                                    {{ $order->price }}
                                </td>
                            </tr>
                        </tbody>
                    @endforeach

                </table>
            </div>
        </div>
        @php
            $np = 0;
        @endphp
        <div class="float-right">
            <div class="test mb-4 mr-6 text-xl font-bold ">
                <label class=""> ทั้งหมด : </label>
                <input class="text-center " type="text" placeholder="" value="{{ $cost }}" disabled />

                บาท
            </div>
            <div class="test mb-4 mr-3 text-xl font-bold">
                <label class=""> รับชำระ : </label>
                <input class="text-center" type="text" placeholder="" value="{{ $customer->getmoney }}"
                    disabled />
                บาท
            </div>
            @if ($customer->getmoney > $customer->total)
                @php
                    $np = $customer->getmoney - $customer->total;
                @endphp
            @endif
            <div class="mb-4 test-r text-xl font-bold">
                <label class=""> ถอน : </label>
                <input class="text-center " type="text" placeholder="" value="{{ $np }}" disabled />
                บาท
            </div>
            @if ($np > 0)
                @php
                    $np = $np + $customer->total - $customer->getmoney;
                @endphp
            @else($np < 0) @php
                    $np = $customer->total - $customer->getmoney;
                @endphp @endif
                    <div class=" mb-4 mr-3 text-xl font-bold">
                        <label class=""> ยอดค้างชำระ : </label>
                        <input class="text-center " type="text" placeholder="" value="{{ $np }}"
                            disabled />

                        บาท
                    </div>


        </div>
</body>

</html>
