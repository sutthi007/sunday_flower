<?php

namespace App\Http\Controllers;

use App\Models\customeradd;
use Illuminate\Http\Request;

class CustomerAddController extends Controller
{
    //
    public function index(){
        $customer = customeradd::all();
        return view('customerData.CustomerView',compact('customer'));
    }
    public function store(Request $request){
      

        customeradd::create($request->all());
        return redirect()->route('customer.index');
    }
    public function edit($id,Request $request){
        $customer = customeradd::find($id);
        return view('customerData.CustomerView-editor', compact('customer'));
    }
    public function udpate($id,Request $request){
        $customer = customeradd::find($id);

        $customer->update($request->all());
        return view('customerData.CustomerView',compact('customer'));
    }
    public function destroy($id,Request $request){
        $customer = customeradd::find($id);

        $customer->delete();
        return redirect()->route('customer.index');
    }

}
