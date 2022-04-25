<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function index(){

        $customers = customer::all();
        return view('customer.customer',compact('customers'));
    }

    public function show($id){

        $customers = customer::find($id);

        return view('customer.customer-editor', compact('customers'));
    }
    public function destroy($id){
        $customers = customer::find($id);
        $customers->delete();

        return redirect()->route('customer-systems.index');
    }

}
