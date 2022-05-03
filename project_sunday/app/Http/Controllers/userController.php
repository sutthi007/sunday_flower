<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\Order;
use App\Models\User;
use App\Models\province;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
class userController extends Controller
{
    //
    public function index(){

        $orders = Order::whereDate('created_at',Carbon::today())->orderBy('id', 'DESC')->paginate(10);
        $status = Order::whereDate('created_at',Carbon::today());
        $provinces = province::all();
        return view('projects.index',compact('orders','status','provinces'))->with('i',(request()->input('page',1 ) - 1 ) * 10);
    }
    public function store(Request $request){
       $request->validate([
            'name' =>'bail',
            'province' =>'required',
            'subdistrict' =>'required',
            'phone' => 'required',
        ],
        [
            'name.bail'=> 'กรุณากรอกชื่อ',
            'province.required'=>'กรุณาเลือกจังหวัด',
            'subdistrict.required'=>'กรุณาเลือกอำเภอ',
            'phone.required'=> 'กรุณากรอกเบอร์โทร',

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

        return redirect()->back();
    }
    public function search(Request $request){
        $status = Order::whereDate('created_at',Carbon::today());
        $search = $request->get('search');
        $orders = Order::whereDate('created_at',Carbon::today())->where('name', 'LIKE', '%'.$search. '%')->orWhere('type', 'LIKE', '%'.$search. '%')->paginate(10)->setPath( '' );
        $provinces = province::all();

        return view('projects.index',compact('orders','status','provinces'))->with('i',(request()->input('page',1 ) - 1 ) * 10);
    }
    public function dateScan(Request $request){

        $date = $request->get('date');
        $status = Order::whereDate('created_at',$date);
        $orders = Order::whereDate('created_at',$date)->paginate(10);
        $provinces = province::all();

       return view('projects.index',compact('status','orders','provinces'))->with('i',(request()->input('page',1 ) - 1 ) * 10);
    }
    public function order(){
        $orders = Order::whereDate('created_at',Carbon::today())->Where('status','order')->orderBy('id', 'DESC')->paginate(10);
        $status = Order::whereDate('created_at',Carbon::today());
        $provinces = province::all();

        return view('projects.index',compact('orders','status','provinces'))->with('i',(request()->input('page',1 ) - 1 ) * 10);
    }
    public function transit(){
        $orders = Order::whereDate('created_at',Carbon::today())->where('status','send')->orderBy('id', 'DESC')->paginate(10);
        $status = Order::whereDate('created_at',Carbon::today());
        $provinces = province::all();

        return view('projects.index',compact('orders','status','provinces'))->with('i',(request()->input('page',1 ) - 1 ) * 10);
    }
    public function success(){
        $orders = Order::whereDate('created_at',Carbon::today())->where('status','success')->orderBy('id', 'DESC')->paginate(10);
        $status = Order::whereDate('created_at',Carbon::today());
        $provinces = province::all();

        return view('projects.index',compact('orders','status','provinces'))->with('i',(request()->input('page',1 ) - 1 ) * 10);
    }
    public function update($id,Request $request){
        $order = Order::find($id);

        $order->update([
            'status' => $request->status,
        ]);

        return redirect()->back();
    }
    public function forgot_password(Request $request){
        $user = User::where('IDuser',$request->IDuser)->first();
        $request->validate([
            'IDuser' => 'required',
            'phone' => 'required',
            ],
            [
                'IDuser.required' => 'กรุณากรอกเลขที่ผู้ใช้',
                'phone.required' => 'กรุณากรอกเลขเบอร์โทร',
            ]);
            if($request->IDuser == $user->IDuser){
                if($request->phone == $user->phone){

                    $user->update([
                        'password' => bcrypt('123456789'),
                    ]);
        
                    return redirect()->route('login')->with('success',('รีเซ็ตรหัสผ่านเรียบร้อย'));
                }else{
                    return redirect()->back()->with('error',('เบอร์โทรไม่ถูกต้อง'));
                }
            }else{
                return redirect()->back()->with('error',('เลขผู้ใช้ไม่ถูกต้อง'));
            }
            
    }

}
