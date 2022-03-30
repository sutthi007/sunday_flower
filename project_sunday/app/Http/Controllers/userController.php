<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;
class userController extends Controller
{
    //
    public function index(){

        $orders = Order::orderBy('id', 'DESC')->paginate(10);
        $status = Order::all();
        return view('projects.index',compact('orders','status'))->with('i',(request()->input('page',1 ) - 1 ) * 10);
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
    public function destroy($id){
        $order = Order::find($id);
        $order->delete();

        return redirect()->route('projects.index');
    }
    public function search(Request $request){
        $status = Order::all();
        $search = $request->get('search');
        $orders = Order::where('name', 'LIKE', '%'.$search. '%')->orWhere('type', 'LIKE', '%'.$search. '%')->paginate(10)->setPath( '' );

        return view('projects.index',compact('orders','status'))->with('i',(request()->input('page',1 ) - 1 ) * 10);
    }
    public function order(){
        $orders = Order::orderBy('id', 'DESC')->paginate(10);
        $status = Order::all();
        return view('projects.index-order',compact('orders','status'))->with('i',(request()->input('page',1 ) - 1 ) * 10);
    }
    public function transit(){
        $orders = Order::orderBy('id', 'DESC')->paginate(10);
        $status = Order::all();
        return view('projects.index-transit',compact('orders','status'))->with('i',(request()->input('page',1 ) - 1 ) * 10);
    }
    public function success(){
        $orders = Order::orderBy('id', 'DESC')->paginate(10);
        $status = Order::all();
        return view('projects.index-success',compact('orders','status'))->with('i',(request()->input('page',1 ) - 1 ) * 10);
    }

}