<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\Order;
use Illuminate\Http\Request;

class userController extends Controller
{
    //
    public function index(){

        $orders = Order::all();
        return view('projects.index',compact('orders'));
    }
    public function store(Request $request){

        $customer = customer::create([
            'name' => $request->name,
            'province' => $request->province,
            'subdistrict' => $request->subdistrict,
            'phone' => $request->phone,
        ]);

        return redirect()->route('FormOrder.show',$customer);
    }



}
