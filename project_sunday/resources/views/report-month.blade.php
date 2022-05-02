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
                    <tbody class="w-full p-4 text-center border-4 text-2xl">
                            <tr class="text-xl border-4">
                                
                                <td class="">มกราคม</td>
                                <td class="">เชียงใหม่</td>
                                <td class="">300</td>
                                <td class="">475</td>
                            </tr>
                            <tr class="text-xl border-4">
                                
                                <td class="font-bold " colspan="2">ยอดรวมทั้งหมด</td>
                                <td class="">300</td>
                                <td class="">475</td>
                            </tr>
                           
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>