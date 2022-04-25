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

        $orders = Order::whereDate('created_at',Carbon::today())->orderBy('id', 'DESC')->paginate(10);
        $status = Order::whereDate('created_at',Carbon::today());
        return view('projects.index',compact('orders','status'))->with('i',(request()->input('page',1 ) - 1 ) * 10);
    }
    public function store(Request $request){
       $request->validate([
            'name' =>'bail',
            'province' =>'required',
            'subdistrict' =>'required',
            'phone' => 'required|regex:/(0)[0-9]{2}[-]{1}[0-9]{7}/|size:11',
        ],
        [
            'name.bail'=> 'กรุณากรอกชื่อ',
            'province.required'=>'กรุณาเลือกจังหวัด',
            'subdistrict.required'=>'กรุณาเลือกอำเภอ',
            'phone.required'=> 'กรุณากรอกเบอร์โทร',
            'phone.regex'=> 'กรุณากรอก 09 08 05',
            'phone.size'=>'กรุณากรอให้ครบ 10 ตัว',
        ]
    );

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
        $status = Order::whereDate('created_at',Carbon::today());
        $search = $request->get('search');
        $orders = Order::whereDate('created_at',Carbon::today())->where('name', 'LIKE', '%'.$search. '%')->orWhere('type', 'LIKE', '%'.$search. '%')->paginate(10)->setPath( '' );

        return view('projects.index',compact('orders','status'))->with('i',(request()->input('page',1 ) - 1 ) * 10);
    }
    public function dateScan(Request $request){
        
        $date = $request->get('date');
        $status = Order::whereDate('created_at',$date);      
        $orders = Order::whereDate('created_at',$date)->paginate(10);

       return view('projects.index',compact('status','orders'))->with('i',(request()->input('page',1 ) - 1 ) * 10);
    }
    public function order(){
        $orders = Order::whereDate('created_at',Carbon::today())->Where('status','order')->orderBy('id', 'DESC')->paginate(10);
        $status = Order::whereDate('created_at',Carbon::today());
        return view('projects.index',compact('orders','status'))->with('i',(request()->input('page',1 ) - 1 ) * 10);
    }
    public function transit(){
        $orders = Order::whereDate('created_at',Carbon::today())->where('status','send')->orderBy('id', 'DESC')->paginate(10);
        $status = Order::whereDate('created_at',Carbon::today());
        return view('projects.index',compact('orders','status'))->with('i',(request()->input('page',1 ) - 1 ) * 10);
    }
    public function success(){
        $orders = Order::whereDate('created_at',Carbon::today())->where('status','success')->orderBy('id', 'DESC')->paginate(10);
        $status = Order::whereDate('created_at',Carbon::today());
        return view('projects.index',compact('orders','status'))->with('i',(request()->input('page',1 ) - 1 ) * 10);
    }
    public function update($id,Request $request){
        $order = Order::find($id);

        $order->update([
            'status' => $request->status,
        ]);

        return redirect()->back();
    }

}
