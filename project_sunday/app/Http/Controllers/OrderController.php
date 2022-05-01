<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\Order;
use App\Exports\TransportsDaysExport;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\Mailer\Transport;
use App\Models\province;
use App\Models\service;
use Barryvdh\DomPDF\Facade\PDF;
use Dompdf\Adapter\PDFLib;

class OrderController extends Controller
{
    public function index()
    {
        return view('Order.order');
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'name' =>'required',
            'city' =>'required',
            'province' =>'required',
            'phone' =>'required',
            'type' =>'required',
            'quantity' =>'required',
            'price' =>'required',
            'customer_id' =>'required',
            'amount' => 'required',
        ]);
        $order = Order::create([
            'name' => $request->name,
            'city_id' => $request->city,
            'province_id' => $request->province,
            'phone' => $request->phone,
            'type' => $request->type,
            'list' => $request->list,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'customer_id' => $request->customer_id,
            'sendto' => $request->sendto,
            'price_to' => $request->price_sendto,
            'amount' => $request->amount,
            'phoneOne' => $request->phone_one,
            'provinces_to' => $request->provinces,
            'tracking' => 'SD'.$request->province.time().random_int(00,99),
        ]);
        $customer = $request->customer_id;

        return redirect()->route('FormOrder.show', $customer);
    }

    public function show($id)
    {
        $customer = customer::find($id);
        $province  = province::all();

        return view('Order.order-step-1', compact('customer','province',));
    }

    public function destroy($idorder)
    {

        $order = Order::find($idorder);
        $customer = $order->customer->id;
        $order->delete();
        return redirect()->route('FormOrder.show', $customer);
    }
    public function edit($id)
    {
        $order = Order::find($id);
        return view('projects.index-editor', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        $order->update($request->all());

        return redirect()->route('projects.index')
            ->with('success', 'อัปเดทสำเร็จ ');
    }
    public function editOrder($id)
    {
        $order = Order::find($id);
        return view('Order.order-editor', compact('order'));
    }
    public function updateOrder(Request $request, $id)
    {
        $order = Order::find($id);

        $order->update($request->all());

        return redirect()->route('FormOrder.show',$id)
            ->with('success', 'อัปเดทสำเร็จ ');
    }
    public function sum($id)
    {
        $customer = customer::find($id);
        return view('Order.order-be-paid', compact('customer'));
    }
    public function bill($id)
    {
        $customer = customer::find($id);
        return view('Order.order-end', compact('customer'));
    }
    public function prnpriview($id)
      {
            $customer = customer::find($id);
            $pdf = PDF::loadView('Order.bill',compact('customer'));
            return @$pdf->stream();
      }
    public function total(Request $request)
    {  
        $cus = customer::find($request->customer_id);

        $cus->update([
            'total' => $request->total,
        ]);
        $customer = $request->customer_id;

        return redirect()->route('getmoney', $customer);
    }
    public function getmoney(Request $request)
    {  
        $cus = customer::find($request->customer_id);

        $cus->update([
            'getmoney' => $request->getmoney,
        ]);
        $customer = $request->customer_id;

        return redirect()->route('bill', $customer);
    }
    public function exporttoexcel($id)
    {
        $order = Order::find($id);

        return Excel::download(new TransportsDaysExport, $order->created_at . 'รายงานขนส่ง.xlsx');
    }
    public function export(){
        return Excel::download(new TransportsDaysExport(),'test.xlsx');
    }
    // public function pdf(){
    //     return (new TransportsDaysExport)->download('active.pdf');
    // }
    public function downloadPDF($date,$province,Request $request){
        $orders = Order::whereDate('created_at',$date)->get();

        $pdf = PDF::loadView('report',compact('orders','province'));
        return @$pdf->stream();
    }

    public function viewReport(){
        $orders = Order::all()->where('province_id','1');

        $province = 'เชียงใหม่';


        return view('report',compact('orders','province'));
    }
   
}
