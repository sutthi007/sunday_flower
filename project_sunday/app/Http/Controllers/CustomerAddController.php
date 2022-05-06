<?php

namespace App\Http\Controllers;

use App\Models\customeradd;
use App\Models\customer;
use Illuminate\Http\Request;

class CustomerAddController extends Controller
{
    //
    public function index(){
        $customer = customeradd::all();
        return view('customerData.CustomerView',compact('customer'));
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'phone'=>'required|numeric|regex:/(0)[0-9]{9}/|digits:10',
            'city'=>'required',
            'province'=>'required',
            'subdistrict' => 'required'
        ],
        [
            'name.required'=> 'กรุณากรอกชื่อ',
            'city.required'=> 'กรุณากรอกอำเภอ',
            'subdistrict.required'=> 'กรุณากรอกตำบล',
            'province.required'=> 'กรุณากรอกจังหวัด',
            'phone.required'=> 'กรุณากรอกเบอร์โทร',
            'phone.numeric'=> 'กรุณากรอกตัวเลข',
            'phone.regex'=> 'กรุณากรอก 09 08 05',
            'phone.digits'=>'กรุณากรอให้ครบ 10 ตัว',
        ]
    );

        customeradd::create($request->all());
        return redirect()->route('customer.index');
    }
    public function edit($id,Request $request){
        $customer = customeradd::find($id);
        return view('customerData.CustomerView-editor', compact('customer'));
    }
    public function update($id,Request $request){
        $request->validate([
            'name'=>'required',
            'phone'=>'required|numeric|regex:/(0)[0-9]{9}/|digits:10',
            'city'=>'required',
            'province'=>'required',
            'subdistrict' => 'required'
        ],
        [
            'name.required'=> 'กรุณากรอกชื่อ',
            'city.required'=> 'กรุณากรอกอำเภอ',
            'subdistrict.required'=> 'กรุณากรอกตำบล',
            'province.required'=> 'กรุณากรอกจังหวัด',
            'phone.required'=> 'กรุณากรอกเบอร์โทร',
            'phone.numeric'=> 'กรุณากรอกตัวเลข',
            'phone.regex'=> 'กรุณากรอก 09 08 05',
            'phone.digits'=>'กรุณากรอให้ครบ 10 ตัว',
        ]);
        $customer = customeradd::find($id);

        $customer->update($request->all());
        return redirect()->route('customer.index');
    }
    public function destroy($id,Request $request){
        $customer = customeradd::find($id);

        $customer->delete();
        return redirect()->route('customer.index');
    }
    public function overdue(){
        $customers = customer::all();
        return view('customerData.CustomerView-overdue',compact('customers'));
    }
    public function searchSystems(Request $request){
        $search = $request->get('search');
        $customers = customer::where('name', 'LIKE', '%'.$search. '%')->orWhere('province', 'LIKE', '%'.$search. '%')->paginate(10)->setPath( '' );

        return view('customerData.CustomerView-overdue',compact('customers'));
    }
    public function show($id){

        $customers = customer::find($id);

        return view('customerData.CustomerView-overdueSystem', compact('customers'));
    }
    public function overduedestroy($id){
        $customers = customer::find($id);
        $customers->delete();

        return redirect()->route('overdue');
    }
    public function search(Request $request){

        $search = $request->get('search');
        $customer = customeradd::where('name', 'LIKE', '%'.$search. '%')->orWhere('province', 'LIKE', '%'.$search. '%')->paginate(10)->setPath( '' );


        return view('customerData.CustomerView',compact('customer'));
    }

}
