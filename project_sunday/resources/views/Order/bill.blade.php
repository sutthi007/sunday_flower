<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>สรุปบิล</title>
</head>
<body>
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <div class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">

            </div>
            <div class="bg-white dark:bg-gray-800 rounded">
                <div class="m-auto   mt-5 ">
                    <div class="mb-6">
                        <div class="text-3xl font-semibold text-center mb-6 dark:text-white">
                            <h1>สรุปบิล</h1>
                        </div>
                    <img class="w-150px" src="/img/icon.svg" alt="">
                    <div class=" flex w-full justify-between ">
                        <div class="p-2 dark:text-white">
                            <p class="text-3xl" >บริษัท หจก ซันเดย์ ฟลาวเวอร์</p>
                            <p>เลขที่ 268/27 ถนนทุ่งโฮเต็ล อำเภอเมืองเชียงใหม่</p>
                            <p>จังหวัด เชียงใหม่ 50000</p>
                        </div>
                        <div class="p-2 w-200px  text-center dark:text-white">
                            <h1 class="text-2xl">{{$customer->name}}</h1>
                            <p>ทั้งหมด</p>
                                @php
                                    $total = 0;
                                    $cost =0;
                                @endphp
                                @foreach ( $customer->orders as $totals )
                                    @php
                                        $total = $totals->price * $totals->quantity
                                    @endphp
                                    @php
                                        $cost = $total + $cost;
                                    @endphp
                                @endforeach
                            <h1 class="text-2xl bg-pink text-white">{{$cost}}</h1>
                        </div>
                    </div>
                    </div>
                    <form>
                        <div class="w-full overflow-hidden rounded-lg shadow-xs p-3">
                            <div class="w-full overflow-x-auto">
                                <table class="w-full whitespace-no-wrap">
                                    <thead>
                                        <tr
                                            class="text-xs font-semibold tracking-wide  text-center text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
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
                                        $total = 0 ;
                                     @endphp
                                    @foreach ( $customer->orders as $order)
                                        @php 
                                            $total = $order->price * $order->quantity
                                        @endphp
                                        @php
                                            $cost = $total + $cost
                                        @endphp
                                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                            <tr class="text-gray-700 dark:text-gray-400">
                                                <td class="px-4 py-3">1</td>
                                                <td class="px-4 py-3 text-sm">{{$order->list}}</td>
                                                <td class="px-4 py-3 text-xs">{{$order->quantity}}</td>
                                                <td class="px-4 py-3 text-sm">{{$order->name}}</td>
                                                <td class="px-4 py-3 text-sm">{{$order->phone}}</td>
                                                <td class="px-4 py-3 text-sm">
                                                    {{$order->price}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach

                                </table>
                            </div>
                        </div>
                        <div class="mb-4 flex flex-row-reverse m-auto p-3 dark:text-white">
                            บาท
                            <input
                                class="w-200px h-30px appearance-none rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white text-center dark:bg-gray-900"
                                type="text" placeholder="" value="150" disabled />
                            
                            <label class=""> ยอดค้างชำระ : </label>
                        </div>
                        <div class="mb-4 flex flex-row-reverse m-auto p-3 dark:text-white">
                           บาท
                            <input
                                class="w-200px h-30px appearance-none rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white text-center dark:bg-gray-900"
                                type="text" placeholder="" value="{{$cost}}" disabled />
                            <label class=""> ทั้งหมด : </label>
                        </div>
                       
                    </form>
                </div>
            </div>
    </main>
</body>
</html>