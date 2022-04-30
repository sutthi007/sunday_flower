<table class="table">
    <tr>
        <td rowspan="4">รายงานขนส่ง</td>
    </tr>
    <thead>
        <tr>
            <th>ประเภท</th>
            <th>รายการ</th>
            <th>ชื่อ - เบอร์โทร</th>
            <th>จำนวน</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td colspan="4">{{$order->province}}</td>
        </tr>
            @php
                $i = 0
            @endphp
            @foreach( $types->where('province',$order->province) as $type)
            <tr>
                <td>{{$type->type}}</td>
                <td>{{$type->list}}</td>
                <td>{{$type->name}}{{'('.$type->phone .')'}}</td>
                <td>{{$type->quantity}}</td>
            </tr>
                @php
                    $i = $type->quantity + $i
                @endphp
            @endforeach
        <tr>
        <td colspan="3"></td>
        <td>ทั้งหมด {{$i}}  รายการ</td>
        </tr>
        @endforeach   
    </tbody>
</table>