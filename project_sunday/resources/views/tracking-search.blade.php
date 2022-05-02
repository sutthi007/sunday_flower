<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>กรอกข้อมูลลูกค้า</title>
  {{-- CSS --}}
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  {{-- Js --}}
  <!-- <script src="./js/charts-lines.js" defer></script>
  <script src="/js/charts-pie.js" defer></script> -->
  <script src="/js/init-alpine.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <link rel="icon" type="/img/svg" href="/img/icon.svg">
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;700&display=swap" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

</head>

<body class="font-prompt">
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <div class="flex flex-col flex-1 w-full">
            <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
                <div class="">
                    <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                        SUNDAY FLOWER
                    </a>
                </div>
            </header>
            <!-- Form Order -->
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid ">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 ">

                    </h2>
                    <div class="bg-white dark:bg-gray-800 shadow rounded-md">
                        <div class="w-full m-auto  mt-4">
                                <form action="/tracking-search" method="get">
                                    <div class="w-300px m-auto ">
                                        <div class="p-2">
                                            <label
                                                class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 dark:text-white"
                                                for="grid-first-name">
                                                tracking รหัสติดตาม
                                            </label>
                                            <input
                                            class="appearance-none block w-full  text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:bg-gray-900"
                                            id="grid-first-name" type="text" placeholder="" name="tracking">

                                        </div>

                                    </div>
                                    <div class="w-full h-30px  rounded mb-6  text-center p-1 ">
                                        <button class="w-200px h-30px bg-pink rounded mb-6 text-white">ค้นหา</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                    <div class="bg-white dark:bg-gray-800 shadow rounded-md">
                        <div class="w-full m-auto  mt-4 mb-5">
                                    <div class="w-300px m-auto">
                                    @inject('thaiDateHelper', 'App\Services\ThaiDateHelperService')
                                    @if($tracking != null)
                                        @foreach($tracking as $row)
                                            <div class="flex w-auto m-auto">
                                                <h3 class="mr-5">รหัส :</h3><p>{{$row->tracking}}</p>
                                            </div>
                                                @if($row->status == 'order')
                                                    <div class="flex w-auto m-auto">
                                                        <h3 class="mr-5">สถานะ :</h3><p>รับเข้าระบบเรียบร้อยแล้ว</p>
                                                    </div>
                                                @elseif($row->status == 'send')
                                                    <div class="flex w-auto m-auto">
                                                        <h3 class="mr-5">สถานะ :</h3><p>ออเดอร์กำลังถูกจัดส่ง</p>
                                                    </div>
                                                @else
                                                    <div class="flex w-auto m-auto">
                                                        <h3 class="mr-5">สถานะ :</h3><p>การจัดส่งเรียบร้อยแล้ว</p>
                                                    </div>
                                                @endif
                                            <div class="flex w-auto m-auto">
                                                <h3 class="mr-5">ชื่อผู้ส่ง:</h3><p>{{$row->customer->name}}</p>
                                            </div>
                                            <div class="flex w-auto m-auto">
                                                <h3 class="mr-5">ชื่อผู้รับ :</h3><p>{{$row->name}}</p>
                                            </div>
                                            <div class="flex w-auto m-auto">
                                                <h3 class="mr-5">ประเภทจัดส่ง :</h3><p>{{$row->type}} {{$row->list}}</p>
                                            </div>
                                            <div class="flex w-auto m-auto">
                                                <h3 class="mr-5">เวลารับรายการ :</h3><p>{{$thaiDateHelper->simpleDateFormatcustomer($row->created_at)}}</p>
                                            </div>
                                            <div class="flex w-auto m-auto mt-6">
                                                @if($row->province->user_id == null)
                                                    <h3 class="mr-5">ชื่อพนักงานจัดส่ง :</h3><p>กำลังส่งไปยังพนักงานจัดส่ง</p>
                                                @else
                                                    <h3 class="mr-5">ชื่อพนักงานจัดส่ง :</h3><p>{{$row->province->user->name}}</p>
                                                @endif
                                                
                                            </div>
                                            <div class="flex w-auto m-auto">
                                                @if($row->province->user_id == null)
                                                    <h3 class="mr-5">เบอร์โทรติดต่อผู้จัดส่ง :</h3><p>กำลังส่งไปยังพนักงานจัดส่ง</p>
                                                @else
                                                    <h3 class="mr-5">เบอร์โทรติดต่อผู้จัดส่ง :</h3><p>{{$row->province->user->phone}}</p>
                                                @endif 
                                            </div>
                                        @endforeach
                                    @elseif($tracking == empty)
                                        <div class="w-auto m-auto">
                                            <h3 class="mr-5">ไม่พบข้อมูล</h3>
                                        </div>
                                    @endif
                                    </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
