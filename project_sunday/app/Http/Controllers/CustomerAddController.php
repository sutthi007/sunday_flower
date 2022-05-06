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
            'phone'=>'required',
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
    public function show($id){

        $customers = customer::find($id);

        return view('customerData.CustomerView-overdueSystem', compact('customers'));
    }
    public function overduedestroy($id){
        $customers = customer::find($id);
        $customers->delete();

        return redirect()->route('overdue');
    }

}
