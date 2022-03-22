<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\Order;

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
        'type'=> $request->type,
        'list'=> $request->list,
        'quantity'=> $request->quantity,
        'price'=> $request->price,
        'customer_id' => $request->customer_id,
    ]);
    $customer = $request->customer_id;

    return redirect()->route('FormOrder.show',$customer);
}

   public function show($test){
        $customer = customer::find($test);
        return view('Order.order-step-1', compact('customer'));
    }


}
