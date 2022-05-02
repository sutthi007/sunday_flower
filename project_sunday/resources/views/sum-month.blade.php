<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ public_path('css/index.css') }}" rel="stylesheet">
    <title>รายการฝากของบริษัท</title>
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
                            <th class="">เดือน/ปี</th>
                            <th class="">ค่าฝากของ/บาท</th>
                            <th class="">ส่งต่อ/บาท</th>
                            <th class="">จำนวนเงิน</th>
                        </tr>
                    </thead>
                    <tbody class="w-full p-4 border-4 text-2xl">   
                            <tr class="text-xl border-4"> 
                                <td class=" text-center">มกราคม/2565</td>
                                <td class="text-right pr-l">{{number_format((float)40000,2)}}</td>
                                <td class="text-right pr-l">{{number_format((float)40000,2)}}</td>
                                <td class="text-right pr-l">{{number_format((float)40000+40000,2)}}</td>
                            </tr>
                            <tr class="text-xl border-4"> 
                                <th></th>
                                <td class=" font-bold pr-l" colspan="2">ค่าใช้จ่ายรวมทั้งหมด (บาท)</td>
                                <td class="text-right pr-l">{{number_format((float)60000,2)}}</td>
                                
                            </tr>
                            <tr class="text-xl border-4"> 
                                <th></th>
                                <td class=" font-bold pr-l" colspan="2">ยอดคงเหลือ (บาท)</td>
                                <td class="text-right pr-l">{{number_format((float)40000+40000-60000,2)}}</td>
                                
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
