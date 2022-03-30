<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\Order;
use App\Exports\TransportsDaysExport;
use Excel;

class OrderController extends Controller
{
   public function index(){

       return view('Order.order');
   }

   public function store(Request $request){
    $order = Order::create([
        'name' => $request->name,
        'city'=> $request->city,
        'province'=> $request->province,
        'phone'=> $request->phone,
        'type'=> $request->type,
        'list'=> $request->list,
        'quantity'=> $request->quantity,
        'price'=> $request->price,
        'customer_id' => $request->customer_id,
    ]);
    $customer = $request->customer_id;

    return redirect()->route('FormOrder.show',$customer);
}

   public function show($id){
        $customer = customer::find($id);
        return view('Order.order-step-1', compact('customer'));
    }

    public function destroy($idorder){

        $order = Order::find($idorder);
        $customer = $order->customer->id;
        $order->delete();
        return redirect()->route('FormOrder.show',$customer);
    }
    public function edit($id){
        $order = Order::find($id);
        return view('projects.index-editor',compact('order'));
    }

    public function update(Request $request,$id){
        $order = Order::find($id);

        $order->update($request->all());

        return redirect()->route('projects.index')
                        ->with('success','อัปเดทสำเร็จ ');
    }
    public function sum($id){
        $customer = customer::find($id);
        return view('Order.order-end',compact('customer'));
    }
    public function total(Request $request){

        Order::where('total',$request->total)->get();
        $customer = $request->customer_id;

        return redirect()->route('bill',$customer);
    }
    public function exportIntoExcel($id){
        $order = Order::find($id);

        return Excel::download(new TransportsDaysExport,$order->created_at . 'รายงานขนส่ง.xlsx');
    }

}
